$(()=>{

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
        // $(".videoParent")
        //   .css('background-image',"url('/images/contact.jpg')")
        //   .css('background-size','cover')
        //   .css('background-position','center')
          // Automatic playback failed.
          // Show a UI element to let the user manually start playback.
      });
  };

  // Opens and closes the 'delete' button
  $('[data-deletebutton]').click(()=>{
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
