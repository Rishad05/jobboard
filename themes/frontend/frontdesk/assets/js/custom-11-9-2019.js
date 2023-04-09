
jQuery(document).ready(function(e) {
	var mySlider = jQuery('#js-main-slider').pogoSlider({
		pauseOnHover: false,
		autoplay: true,
		generateNav: false,
		displayProgess: true,
		autoplayTimeout: 6000,
		targetHeight: 445,
		responsive: true,
	}).data('plugin_pogoSlider');
});

$('#tick2').html($('#tick').html());
//alert($('#tick2').offset.left);

var temp=0,intervalId=0;
$('#tick li').each(function(){
  var offset=$(this).offset();
  var offsetLeft=offset.left;
  $(this).css({'left':offsetLeft+temp});
  temp=$(this).width()+temp+10;
});
$('#tick').css({'width':temp+40, 'margin-left':'20px'});
temp=0;
$('#tick2 li').each(function(){
  var offset=$(this).offset();
  var offsetLeft=offset.left;
  $(this).css({'left':offsetLeft+temp});
  temp=$(this).width()+temp+10;
});
$('#tick2').css({'width':temp+40,'margin-left':temp+40});

function abc(a,b) {  
    
    var marginLefta=(parseInt($("#"+a).css('marginLeft')));
    var marginLeftb=(parseInt($("#"+b).css('marginLeft')));
    if((-marginLefta<=$("#"+a).width())&&(-marginLefta<=$("#"+a).width())){
        $("#"+a).css({'margin-left':(marginLefta-1)+'px'});
    } else {
        $("#"+a).css({'margin-left':temp});
    }
    if((-marginLeftb<=$("#"+b).width())){
        $("#"+b).css({'margin-left':(marginLeftb-1)+'px'});
    } else {
        $("#"+b).css({'margin-left':temp});
    }
} 

     function start() { intervalId = window.setInterval(function() { abc('tick','tick2'); }, 50) }

     $(function(){
          $('#outer').mouseenter(function() { window.clearInterval(intervalId); });
    $('#outer').mouseleave(function() { start(); })
          start();
     });




// counter js
(function ($) {
  $.fn.countTo = function (options) {
    options = options || {};
    
    return $(this).each(function () {
      // set options for current element
      var settings = $.extend({}, $.fn.countTo.defaults, {
        from:            $(this).data('from'),
        to:              $(this).data('to'),
        speed:           $(this).data('speed'),
        refreshInterval: $(this).data('refresh-interval'),
        decimals:        $(this).data('decimals')
      }, options);
      
      // how many times to update the value, and how much to increment the value on each update
      var loops = Math.ceil(settings.speed / settings.refreshInterval),
        increment = (settings.to - settings.from) / loops;
      
      // references & variables that will change with each update
      var self = this,
        $self = $(this),
        loopCount = 0,
        value = settings.from,
        data = $self.data('countTo') || {};
      
      $self.data('countTo', data);
      
      // if an existing interval can be found, clear it first
      if (data.interval) {
        clearInterval(data.interval);
      }
      data.interval = setInterval(updateTimer, settings.refreshInterval);
      
      // initialize the element with the starting value
      render(value);
      
      function updateTimer() {
        value += increment;
        loopCount++;
        
        render(value);
        
        if (typeof(settings.onUpdate) == 'function') {
          settings.onUpdate.call(self, value);
        }
        
        if (loopCount >= loops) {
          // remove the interval
          $self.removeData('countTo');
          clearInterval(data.interval);
          value = settings.to;
          
          if (typeof(settings.onComplete) == 'function') {
            settings.onComplete.call(self, value);
          }
        }
      }
      
      function render(value) {
        var formattedValue = settings.formatter.call(self, value, settings);
        $self.html(formattedValue);
      }
    });
  };
  
  $.fn.countTo.defaults = {
    from: 0,               // the number the element should start at
    to: 0,                 // the number the element should end at
    speed: 1000,           // how long it should take to count between the target numbers
    refreshInterval: 100,  // how often the element should be updated
    decimals: 0,           // the number of decimal places to show
    formatter: formatter,  // handler for formatting the value before rendering
    onUpdate: null,        // callback method for every time the element is updated
    onComplete: null       // callback method for when the element finishes updating
  };
  
  function formatter(value, settings) {
    return value.toFixed(settings.decimals);
  }
}(jQuery));

jQuery(function ($) {
  // custom formatting example
  $('.count-number').data('countToOptions', {
  formatter: function (value, options) {
    return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
  }
  });
  
  // start all the timers
  $('.timer').each(count);  
  
  function count(options) {
  var $this = $(this);
  options = $.extend({}, options || {}, $this.data('countToOptions') || {});
  $this.countTo(options);
  }
});
// counter js


//Our Case Start
    $('.case_active').slick({
        dots: false,
        infinite: true,
        speed: 3000,
        arrows: false,
        autoplay: true,
        prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-chevron-left"></i></i></button>',
        nextArrow: '<button type="button" class="slick-next"><i class="fas fa-chevron-right"></i></i></button>',
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplaySpeed: 2000,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: false
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    arrows: false,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: false,
                    
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });
//Our Case End




//Our Case Start
    $('.service_case_active').slick({
        dots: false,
        infinite: true,
        speed: 2000,
        arrows: true,
        autoplay: false,
        prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-chevron-left"></i></i></button>',
        nextArrow: '<button type="button" class="slick-next"><i class="fas fa-chevron-right"></i></i></button>',
        slidesToShow: 2,
        slidesToScroll: 1,
        autoplaySpeed: 2000,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    infinite: true,
                    dots: false
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    arrows: false,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: false,
                    
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });
//Our Case End//Our Case Start
    $('.training_case_active').slick({
        dots: false,
        infinite: true,
        speed: 2000,
        arrows: true,
        autoplay: false,
        prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-chevron-left"></i></i></button>',
        nextArrow: '<button type="button" class="slick-next"><i class="fas fa-chevron-right"></i></i></button>',
        slidesToShow: 2,
        slidesToScroll: 1,
        autoplaySpeed: 2000,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    infinite: true,
                    dots: false
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    arrows: false,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: false,
                    
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });
//Our Case End


//Our Case Start
    $('.SC_case_active').slick({
        dots: false,
        infinite: true,
        speed: 2000,
        arrows: true,
        autoplay: true,
        prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-chevron-left"></i></i></button>',
        nextArrow: '<button type="button" class="slick-next"><i class="fas fa-chevron-right"></i></i></button>',
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplaySpeed: 2000,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 2,
                    infinite: true,
                    dots: false
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    arrows: false,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: false,
                    
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });
//Our Case End//Our Case Start