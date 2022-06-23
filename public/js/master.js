$(()=>{

  // Opens/closes the main menu at the top
  $("#mainMenuBttn").click(()=>{
    var tableLeft = $("#mainMenuTable").css('left');
    var width = $("#mainMenuTable").outerWidth(true) * -1 + "px";
    console.log(width);
    if (tableLeft == "0px") {
      tableLeft = $("#mainMenuTable").css('left',width);
    } else {
      tableLeft = $("#mainMenuTable").css('left','0px');
    };
  });

  // Generic function to auto-scroll to the selected section


  // Auto-scroll to the search engine
  

})
