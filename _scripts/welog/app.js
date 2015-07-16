$(document).ready(function() {
  // $.magnificPopup.instance Popup data
  var baseTitle = 'welcome to Welog.co';
  var baseUrl = '/naapaii/_scripts/welog/';

  $('.simple-ajax-popup-align-top').click(function(e){
    e.preventDefault();
    history.pushState({}, '', $(this).attr("href"));
    var getTitle = $(this).attr("title");
    document.title = getTitle;
  });

  $('.simple-ajax-popup-align-top').magnificPopup({
    type: 'ajax',
    alignTop: false,
    overflowY: 'scroll',
    preloader: true,
    modal: true,
    midClick: true,
    mainClass: 'mfp-fade',
    callbacks: {
      parseAjax: function(mfpResponse) {
        mfpResponse.data = $(mfpResponse.data).filter('#magnific-content');
        console.log('Ajax content loaded:', mfpResponse.data);
      },
      ajaxContentAdded: function() {
        console.log('Ajax content added, and the popup opened!');

        $(document).on('keyup',function(evt) {
          if (evt.keyCode == 27) {
            $.magnificPopup.close();
            console.log("You close popup by {Pressed: ESC}");
          } else if(evt.keyCode == 8) {
            $.magnificPopup.close();
            console.log("You close popup by {Pressed: Backspace}");
          }
        });
        $(document).mouseup(function (e)
        {
          var container = $("#magnific-content");
          if (!container.is(e.target) && container.has(e.target).length === 0)
          {
            console.log("You close popup by {Clicked of Div}!");
            $.magnificPopup.close();
          }
        });
      },
      beforeOpen: function() {
        console.log("Before Open");
      },
      open: function() {
        console.log('Ajax content popup data:', $.magnificPopup.instance);
      },
      close: function() {
        history.pushState({}, '', baseUrl);
        document.title = baseTitle;
        console.log("You popup has been closed!");
      }
    }
  });

 });