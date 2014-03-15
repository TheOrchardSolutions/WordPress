#! /bin/bash

#################################
###Apple Training Schedule URL###
#################################
APPLE_SCHEDULE="http://training.apple.com/schedule?a=baton+rouge"

###########################
###Output file variables###
###########################
OUT_FILE="current-training.html"
OUT_DIR="/var/www/wordpress/wp-content/scripts"

##############################################################################################
###DO NOT CHANGE TRAINING_FILE. If you want the file moved, redirect the 2 variables above.###
##############################################################################################
TRAINING_FILE="$OUT_DIR/$OUT_FILE"

########################################
###Get the contents of the apple page###
########################################
UNPARSED_PAGE=$(wget "$APPLE_SCHEDULE" -O-)

##############################################
###Get the line numbers for the table range###
##############################################
BEGIN_TABLE_LINE=$(echo "$UNPARSED_PAGE" | grep -n -i "<table>" | awk -F ":" '{print $1}')
END_TABLE_LINE=$(echo "$UNPARSED_PAGE" | grep -n -i "</table>" | awk -F ":" '{print $1}')
TABLE_LENGTH=$(echo "scale=0; $END_TABLE_LINE-$BEGIN_TABLE_LINE+1" | bc)

############################
###Select the table range###
############################
UNPARSED_PAGE=$(echo "$UNPARSED_PAGE" | tail -n"+$BEGIN_TABLE_LINE"| head -n "$TABLE_LENGTH")

#######################################
###Get the line numbers for the form###
#######################################
BEGIN_FORM_LINE=$(echo "$UNPARSED_PAGE" | grep -n -i "<form" | awk -F ":" '{print $1-1}' | bc)
END_FORM_LINE=$(echo "$UNPARSED_PAGE" | grep -n -i "</form>" | awk -F ":" '{print $1}')
PAGE_LENGTH=$(echo "$UNPARSED_PAGE" | wc -l )
END_LENGTH=$(echo "scale=0; $PAGE_LENGTH-$END_FORM_LINE" | bc)

############################
###Get table without form###
############################
DESIRED_CONTENTS_0=$(echo "$UNPARSED_PAGE" | head -n "$BEGIN_FORM_LINE")
DESIRED_CONTENTS_1=$(echo "$UNPARSED_PAGE" | tail -n "$END_LENGTH")
DESIRED_CONTENTS="${DESIRED_CONTENTS_0}${DESIRED_CONTENTS_1}"

###################################
###Strip out the Location Column###
###################################
DESIRED_CONTENTS=$(echo "$DESIRED_CONTENTS" | grep -v "class=\'form\'")
DESIRED_CONTENTS=$(echo "$DESIRED_CONTENTS" | grep -v "Training Center")
DESIRED_CONTENTS=$(echo "$DESIRED_CONTENTS" | grep -v "href=\"http://mactektraining.com\"")

####################################################
###Expand the relative links, use TARGET="_blank"###
####################################################
DESIRED_CONTENTS=$(echo "$DESIRED_CONTENTS" | sed 's/<table>/<table cellspacing=\"20\">/g')
DESIRED_CONTENTS=$(echo "$DESIRED_CONTENTS" | sed 's/\/locations\?/http:\/\/training.apple.com\/locations/g')
DESIRED_CONTENTS=$(echo "$DESIRED_CONTENTS" | sed 's/\/img\//\/images\//g')
DESIRED_CONTENTS=$(echo "$DESIRED_CONTENTS" | sed 's/<a href=\"http:\/\/\(.*\)\">/<a href=\"http:\/\/\1\" TARGET="_blank">/g')

##############################
###Output to $TRAINING_FILE###
##############################
$(echo "$DESIRED_CONTENTS" > "$TRAINING_FILE")
$(chown "www-data:www-data" "$TRAINING_FILE")
