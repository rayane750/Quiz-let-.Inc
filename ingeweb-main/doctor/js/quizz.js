jQuery(function() {
  var currentCard = 0; // Variable to store the current flashcard number
  var maxCard = 0;
  var response = ""; // Variable to store the response string

  $.ajax({
    type: "GET",
    url: "../api/memo_card/read.php",
    dataType: 'json',
    success: function(data) {
      for (var memo_card in data) {
        response += "<card>" +
          "<dt>" + data[memo_card].question + "</dt>" +
          "<dd>" + data[memo_card].reponse + "</dd>" +
          "</card>";
        maxCard++;
      }

      addNewCard(response); // Call addNewCard function with the final response
    },
    error: function(result) {
      alert(result.responseText);
      alert("Error occurred");
    },
  });

  function addNewCard(wordpool) {
    var cardList = $('#card-list');

    cardList.slick('unslick');
    cardList.html(wordpool); // Use html() instead of append() to replace the entire content
    cardList.slick(HomeSliderSetting());

    updateCurrentCard(); // Update the current flashcard number
  }
      
  function addNewCard(wordpool) {
    var cardList = $('#card-list');

    cardList.slick('unslick');
    cardList.append(wordpool);
    cardList.slick(HomeSliderSetting());

    updateCurrentCard(); // Update the current flashcard number
  }

  $('#card-list').slick(HomeSliderSetting());

  function HomeSliderSetting() {
    return {
      centerMode: true,
      arrows: false,
      centerPadding: '20px',
      slidesToShow: 1,
      responsive: [{
        breakpoint: 950,
        settings: {
          slidesToShow: 1,
          centerPadding: '10px'
        }
      }]
    }
  }

  function updateCurrentCard() {
    var currentSlide = $('#card-list .slick-current');
    var slideIndex = currentSlide.attr('data-slick-index');
    if (currentCard <= maxCard) {
      currentCard = parseInt(slideIndex) + 1;
    }
    // Remove previously added circles
    $('#card-list .slick-slide').removeClass('current');

    // Add colored circle to the current flashcard
    currentSlide.addClass('current');
    percent = Math.round((100/maxCard) * currentCard);
    // Update the current flashcard number
    $('#current-card-number').text(percent + '%');

    // Disable/Enable next and previous buttons based on the current card number
    $('#card-list .slick-next').toggle(currentCard < maxCard);
    $('#card-list .slick-prev').toggle(currentCard > 1);

    // Animate the progression bar
    var $progress = $(".progress-bar .progress-fill");
    var duration = 500; // Duration of the animation in milliseconds
    // Calculate the target height based on the percentage
    var targetHeight = (percent) * 13;
    // Animate the height change  
    $progress.stop().animate({
      width: targetHeight
    }, duration);

  }

  $('#card-list').on('init', function() {
    $('.slick-current', this).addClass('flip');
    updateCurrentCard(); // Update the current flashcard number on initialization
  });

  $('#card-list').on('beforeChange', function() {
    $('.slick-slide', this).removeClass('flip');
  });

  $('#card-list').on('afterChange', function() {
    updateCurrentCard(); // Update the current flashcard number after changing
  });

  $('#card-list').on('click', '.slick-current', function() {
    $(this).toggleClass('flip');
  });
})
