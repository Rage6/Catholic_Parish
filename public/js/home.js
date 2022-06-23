$(()=>{

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
