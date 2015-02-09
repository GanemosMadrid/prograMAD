(function($) {
  
	// custom checkbox skin plugin
	$('input').iCheck({
    checkboxClass: 'icheckbox_minimal-orange',
    radioClass: 'iradio_minimal-orange',
    increaseArea: '20%' // optional
  });
	
	// sign in form 1
	$('#signIn_1').click(function (e) {  
	   
			var username = $.trim($('#un_1').val());
	    var password = $.trim($('#pw_1').val());

	    if ( username === '' || password === '' ) {
        $('#form_1 .fa-user').removeClass('success').addClass('fail');
				$('#form_1').addClass('fail');
	    } else {
	   		$('#form_1 .fa-user').removeClass('fail').addClass('success');
				$('#form_1').removeClass('fail').removeClass('animated');
				return false;
	    }
	});

})(jQuery);


// wizard sign up form
jQuery(function($) {
	
    var current;
    var navstep;

    current = $('.page-container').find('.current');
    navstep = $('.nav-step').find('.active');

    $('.page-container li').not(current).hide();
    setDynamics(current);

    $('.nav-step-btn').on('click', function (e) {
        if ($(this).parent().attr('id') === "next") {
            e.preventDefault();
            if (current.next().length === 0) return;

            if (current.index() < 2) {
                showHideWizardPage(current.next(), navstep.next());
            }
        } else if ($(this).parent().attr('id') === "prev") {
            e.preventDefault();
            if (current.prev().length === 0) return;

            showHideWizardPage(current.prev(), navstep.prev());
        }
    });

    function showHideWizardPage(p, n) {
        p.addClass('current').addClass('animated').show();
        n.addClass('active');

        current.removeClass('current').removeClass('animated').hide();
        navstep.removeClass('active');

        current = p;
        navstep = n;
        setDynamics(current);
    }

    function setDynamics(current) {
        var index = current.index();
        var max = current.parent().children().length - 1;
        $('#prev').toggleClass("invisible", index < 1);
        $('#next').toggleClass("remove", index >= max);
        $('#submit').toggleClass("remove", index < max);
        $('#stepNo').text(index + 1);
    }
		
});
