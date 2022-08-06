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


  // Search for the desired deceased based on a name
  $("#nameInput").keyup(function(e) {
    if (e.key != "Shift") {
      var currentInput = e.currentTarget.value.toLowerCase();
      var allDeceased = $("[data-first]");
      var currentCount = currentInput.length;
      var noResults = true;
      $("#noResults").css('display','none');
      for (var i = 0; i < allDeceased.length; i++) {
        var currentFirst = allDeceased[i].dataset.first.toLowerCase().substring(0,currentCount);
        var currentLast = allDeceased[i].dataset.last.toLowerCase().substring(0,currentCount);
        var currentMaiden = '';
        if (allDeceased[i].dataset.maiden) {
          currentMaiden = allDeceased[i].dataset.maiden.toLowerCase().substring(0,currentCount);
        };
        if (currentInput == currentFirst) {
          noResults = false;
          $("[data-id='" + allDeceased[i].dataset.id + "']").css('display','block');
        } else if (currentInput == currentLast) {
          noResults = false;
          $("[data-id='" + allDeceased[i].dataset.id + "']").css('display','block');
        } else if (currentInput == currentMaiden) {
          noResults = false;
          $("[data-id='" + allDeceased[i].dataset.id + "']").css('display','block');
        } else if (currentInput == currentFirst + " " + currentLast) {
          noResults = false;
          $("[data-id='" + allDeceased[i].dataset.id + "']").css('display','block');
        } else {
          $("[data-id='" + allDeceased[i].dataset.id + "']").css('display','none');
        };
      };
      if (noResults == true) {
        $("#noResults").css('display','block');
      };
    };
  });

  // Displays the selected photo of the deceased individual
  const switchSelectedPhotos = (typeName) => {
    $("[data-size='main']").css('display','none');
    var selected = "[data-size='main'][data-type='" + typeName + "']";
    $(selected).css('display','block');
  };

  // Initially displays the available photo
  if ($("[data-type='profile']")) {
    switchSelectedPhotos('profile');
  } else if ($("[data-type='tombstone']")) {
    switchSelectedPhotos('tombstone');
  } else if ($("[data-type='map']")) {
    switchSelectedPhotos('map');
  } else {
    console.log("No photos were available");
  };

  $("[data-size='thumbnail']").click(function(e) {
    switchSelectedPhotos(e.target.dataset.type);
  });

})
