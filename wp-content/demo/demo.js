// Hello, plum.Shop
// A shopping cart can be initiated by calling the plugin on any element.
// Doing it on the document is the easiest to remember (and fastest, because
// jQuery doesn't need to find anything).
$(document).plum('shop', {

	additem: function (product) {

		// #item-001 is set up to have a limit of 1. While adding a product,
		// check the ID and the quantity being added. If the quantity is greater
		// than 1, force it to a value of 1 and alert the user.
		if (product.id === 'item-001' && product.quantity > 1) {
			confirm(
				'This item is limited to a quantity of one. The other colors are '
				+ 'not limited.'
			);
			product.quantity = 1;

		// Send a notice to the user that the product is being added.
		} else if (typeof this.getItem(product.id) === 'undefined') {
			confirm(
				'You\'ve added &ldquo;'
				+ (product.color ? product.color + ' ' : '')
				+ product.title
				+ '&rdquo; to your cart. '
				+ 'That\'s neat.'
			);
		}
	},

	// The HTML structure of the cart display.
	cartitem: '<span class="thumb"><img src="{thumb}"></span>'
		+ '<span class="title">{title} <span>{size}{color}</span>'
		+ '<span>{description}</span></span>'
		+ '<input class="quantity" value="{quantity}">'
		+ '<span class="price"><span>{pricesingle}</span></span>'
		+ '<span class="price"><span>{pricetotal}</span></span>',

	// The custom checkout method can process transactions in any way. When it
	// returns true (i.e., checkout was successfully completed), the cart is
	// emptied.
	checkout: function () {
		confirm.call(this,
			'The custom checkout method allows you to manipulate the cart however '
			+ 'you see fit. For example, you can have customers fill out a form with '
			+ 'their name, address and credit card info, then pass the form and cart '
			+ 'contents back to your server for processing.<br><br>'
			+ 'You just purchased ' + this.quantity + ' items for a total of '
			+ this.format(this.total) + '.'
			+ (this.cart.discount
				? ' You entered a discount code called ' + this.cart.discount + '.'
				: ''
			)
			+ ' Shipping costs ' + this.format(this.shipping)
			+ ' through ' + this.cart.shipping + '.'
		);
		return true;
	},

	// List of discount codes.
	discountcodes: {
		'10PERCENT': '10%',
		'10DOLLARS': 10
	},

	// Called before emptying the cart. When the return value is false, the
	// cart is not emptied. The demo's "emptycart" function is a little more
	// complicated in order to compensate for the custom pop-up box. The cart
	// is emptied within the "confirm" function if the OK button is clicked.
	emptycart: function () {
		confirm.call(this,
			'This message is controlled by a callback function. '
			+ 'The box itself not part of plum.Shop; it\'s just here to make '
			+ 'everything look consistently pretty.<br><br>'
			+ 'Push OK to empty your cart.',
			true
		);
		return false;
	},

	// Some more configuration options
	amazonmerchant: 'A18WCVD7H429AV',
	googlemerchant: '757785386150193',
	headerurl: 'http://2.s3.envato.com/files/7572734/robocreatif.png',
	moneybookersuser: 'hello',
	moneybookersdomain: 'robocreatif.com',
	paypaluser: 'hello',
	paypaldomain: 'robocreatif.com',
	taxcountry: 'US, GB',
	taxexempt: 55,
	taxrate: 0.045,
	shippingrate: {
		'UPS Ground': 0.08,
		'FedEx Express Saver': 0.10,
		'USPS Priority': 0.07
	},
	shippingexempt: 300

});

// Hooray, AJAX.
// To demonstrate how plum.Shop works with AJAX requests, the demo's shopping
// cart is set up to load the shopping cart in place of the products when the
// cart button is pushed. plum.Shop is constantly listening; that means if you
// have an AJAX site, you don't need to call the cart again.
var continue_shopping = $('#shop');
$('#shop, #cart').bind('click', function (e) {
	e.preventDefault();
	var anchor = $(this), id = anchor.attr('id'), page;

	if (id === 'cart') {
		// The shopping cart link is clicked, but we're already viewing the cart
		if (continue_shopping.is(':visible')) {
			return;
		}
		continue_shopping.parent().fadeIn(300);
	} else {
		continue_shopping.parent().fadeOut(300);
	}

	// Hide the page, then load the new page and show it
	page = $('#page').slideUp(150, 'linear', function () {
		page.load(anchor.attr('href') + ' #page > *', function () {
			page.children().hide();
			page.slideDown(150, 'linear', function () {
				page.children().show();
			});
		});
	});

});

// Quick tooltips
$('[title]').live('mouseover', function () {
	var e = $(this), tooltip = $('<span class="tooltip"><span>' + e.attr('title') + '</span><span></span></span>').prependTo(e.attr('title', ''));
	e.one('mouseout', function () {
		e.attr('title', tooltip.children('span:first-child').html());
		tooltip.remove();
	});
});

// Border/opacity animation
$('li.product a').live({
	mouseenter: function () {
		$('img', this).animate({ opacity: 0.8 }, 150);
		$('span', this).animate({
			borderTopWidth: 0,
			borderRightWidth: 0,
			borderBottomWidth: 0,
			borderLeftWidth: 0
		}, 150);
	},
	mouseleave: function () {
		$('img', this).animate({ opacity: 1 }, 150);
		$('span', this).stop().animate({
			borderTopWidth: 10,
			borderRightWidth: 10,
			borderBottomWidth: 10,
			borderLeftWidth: 10
		}, 150);
	}
});

// Just to keep everything on the demo looking pretty, a little confirm box
var confirm = function (text, empty) {

	var shop = this,

	// Overlay shadow
	overlay = $('<div>', {
		id: 'confirm-overlay',
		css: { opacity: 0.6 }
	}).appendTo('body'),

	// Message box
	message = $('<div>', {
		id: 'confirm',
		css: {
			maxWidth: $(window).width() / 2 - 50
		},
		html: '<div>' + text + '</div>'
	}).appendTo('body'),

	// Button container
	buttons = $('<div id="confirm-buttons">').appendTo(message),

	// Confirm button
	success = $(
		'<div class="big button">'
		+ '<button type="button">OK</button>'
		+ '</div>'
	).appendTo(buttons).bind('click', function () {
		if (empty) {
			shop.emptyCart();
		}
		overlay.add(message).remove();
	});

	// Cancel button
	if (empty) {
		cancel = $(
			'<div class="big button">'
			+ '<button type="button">Cancel</button>'
			+ '</div>'
		).appendTo(buttons).bind('click', function () {
			overlay.add(message).remove();
		});
	}

	// Align the box
	message.css({
		marginTop: -message.outerHeight() / 2,
		marginLeft: -message.outerWidth() / 2
	});

	overlay.add(message).show();
	return false;

};