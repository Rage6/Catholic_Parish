$(()=>{

  $(document).ready(function () {
    if (document.querySelector('video')) {
      var playPromise = document.querySelector('video').play();
      // In browsers that don’t yet support this functionality, 'playPromise' won’t be defined.
      if (playPromise !== undefined) {
          playPromise.then(function() {
            console.log("Autoplay successful");
            // Automatic playback started!
          }).catch(function(error) {
            console.log("Autoplay failed");
            $("video").css('display','none');
            $(".videoImages").css('display','block');
            // Automatic playback failed.
          });
      };
    };
  });

  // Opens and closes the 'delete' button
  $('[data-deletebutton]').click(()=>{
    console.log("the delete button");
    var targetEl = '[data-deletebox=' + event.target.dataset.deletebutton + ']';
    var currentDisplay = $(targetEl).css('display');
    if (currentDisplay == 'none') {
      $('[data-deletebox]').css('display','none');
      $(targetEl).css('display','block');
    } else {
      $('[data-deletebox]').css('display','none');
      $(targetEl).css('display','none');
    };
  });

  // Cancels the opened deletion button
  $('[data-canceldelete]').click(()=>{
    var targetEl = '[data-deletebox=' + event.target.dataset.canceldelete + ']';
    $(targetEl).css('display','none');
  });
})
