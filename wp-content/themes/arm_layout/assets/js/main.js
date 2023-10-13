// Menu Mobile
document.querySelector("#menu-button-open").addEventListener("click", function () {
  document.querySelector(".header-menu").classList.add("show");
});

document.querySelector("#menu-overlay").addEventListener("click", function () {
  document.querySelector(".header-menu").classList.remove("show");
});

document.querySelector("#menu-button-close").addEventListener("click", function () {
  document.querySelector(".header-menu").classList.remove("show");
});

document.querySelectorAll(".header-menu .inner-list .inner-icon-down").forEach(item => {
  item.addEventListener("click", function (item) {
    item.target.classList.toggle("active");
    item.target.parentNode.querySelector("ul").classList.toggle("active");
  });
});
// End Menu Mobile

// Fixed Menu
var heightHeader = document.querySelector("body > header").offsetHeight;
var menu = document.querySelector("body > header > .header-menu");
var heightMenu = menu.offsetHeight;

document.addEventListener("scroll", function () {
  if (document.body.scrollTop > heightHeader - heightMenu || document.documentElement.scrollTop > heightHeader - heightMenu) {
    menu.classList.add("fixed");
  } else {
    menu.classList.remove("fixed");
  }
});
// End Fixed Menu

// Search Mobile
document.querySelector("#search-button-open").addEventListener("click", function () {
  document.querySelector("#search-mobile").classList.toggle("show");
  document.querySelector("#search-mobile input").focus();
});
// End Search Mobile

// Partners Slide
var js_banner_slide = new Swiper(".js-partners-slide", {
  slidesPerView: 2,
  spaceBetween: 8,
  loop: true,
  pagination: {
    el: ".swiper-pagination",
  },
  breakpoints: {
    640: {
      slidesPerView: 2,
    },
    768: {
      slidesPerView: 2,
    },
    1024: {
      slidesPerView: 2,
    },
  },
});
// End Partners Slide

// js-videos-type-1-slide
var js_videos_type_1_slide = new Swiper(".js-videos-type-1-slide", {
  slidesPerView: 2,
  spaceBetween: 16,
  loop: true,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  breakpoints: {
    640: {
      slidesPerView: 2,
    },
    992: {
      slidesPerView: 3,
    },
    1024: {
      slidesPerView: 3,
    },
  },
});
// End js-videos-type-1-slide

// go-to-top
window.onscroll = function () {
  scrollFunction()
};

function scrollFunction() {
  if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
    document.querySelector(".go-to-top").style.display = "inline-flex";
  } else {
    document.querySelector(".go-to-top").style.display = "none";
  }
}

function topFunction() {
  window.scrollTo({
    top: 0,
    behavior: 'smooth'
  })
}

document.querySelector(".go-to-top").addEventListener("click", topFunction);

// End go-to-top

// Audio
const audioPlayer = document.querySelector(".audio-player");
if (audioPlayer) {
  const linkAudio = audioPlayer.dataset.audio;
  const audio = new Audio(linkAudio);

  audio.addEventListener(
    "loadeddata",
    () => {
      audioPlayer.querySelector(".time .length").textContent = getTimeCodeFromNum(
        audio.duration
      );
      audio.volume = .75;
    },
    false
  );

  //click on timeline to skip around
  const timeline = audioPlayer.querySelector(".timeline");
  timeline.addEventListener("click", e => {
    const timelineWidth = window.getComputedStyle(timeline).width;
    const timeToSeek = e.offsetX / parseInt(timelineWidth) * audio.duration;
    audio.currentTime = timeToSeek;
  }, false);

  //click volume slider to change volume
  const volumeSlider = audioPlayer.querySelector(".controls .volume-slider");
  volumeSlider.addEventListener('click', e => {
    const sliderWidth = window.getComputedStyle(volumeSlider).width;
    const newVolume = e.offsetX / parseInt(sliderWidth);
    audio.volume = newVolume;
    audioPlayer.querySelector(".controls .volume-percentage").style.width = newVolume * 100 + '%';
  }, false)

  //check audio percentage and update time accordingly
  setInterval(() => {
    const progressBar = audioPlayer.querySelector(".progress");
    progressBar.style.width = audio.currentTime / audio.duration * 100 + "%";
    audioPlayer.querySelector(".time .current").textContent = getTimeCodeFromNum(
      audio.currentTime
    );
  }, 500);

  //toggle between playing and pausing on button click
  const playBtn = audioPlayer.querySelector(".controls .toggle-play");
  playBtn.addEventListener(
    "click",
    () => {
      if (audio.paused) {
        playBtn.classList.remove("fa-play");
        playBtn.classList.add("fa-pause");
        audio.play();
      } else {
        playBtn.classList.remove("fa-pause");
        playBtn.classList.add("fa-play");
        audio.pause();
      }
    },
    false
  );

  audioPlayer.querySelector(".volume-button").addEventListener("click", () => {
    const volumeEl = audioPlayer.querySelector(".volume-container .volume");
    audio.muted = !audio.muted;
    if (audio.muted) {
      volumeEl.classList.remove("fa-volume-up");
      volumeEl.classList.add("fa-volume-mute");
    } else {
      volumeEl.classList.add("fa-volume-up");
      volumeEl.classList.remove("fa-volume-mute");
    }
  });

  //turn 128 seconds into 2:08
  function getTimeCodeFromNum(num) {
    let seconds = parseInt(num);
    let minutes = parseInt(seconds / 60);
    seconds -= minutes * 60;
    const hours = parseInt(minutes / 60);
    minutes -= hours * 60;

    if (hours === 0) return `${minutes}:${String(seconds % 60).padStart(2, 0)}`;
    return `${String(hours).padStart(2, 0)}:${minutes}:${String(
        seconds % 60
      ).padStart(2, 0)}`;
  }
}
// End Audio

// Change Font Size
$(function () {
  let step = parseInt(localStorage.getItem("stepFontSize"));
  if (isNaN(step)) {
    step = 0;
    localStorage.setItem("stepFontSize", step);
  }

  $(".detail-content").children().each(function () {
    var size = parseInt($(this).css("font-size"));
    size = (size + 5 * step) + "px";
    $(this).css({
      'font-size': size
    });
  });

  $("#btn-increase-fsize").click(function () {
    step += 1;
    localStorage.setItem("stepFontSize", step);
    $(".detail-content").children().each(function () {
      var size = parseInt($(this).css("font-size"));
      size = (size + 5) + "px";
      $(this).css({
        'font-size': size
      });
    });
  });

  $("#btn-decrease-fsize").click(function () {
    step -= 1;
    localStorage.setItem("stepFontSize", step);
    $(".detail-content").children().each(function () {
      var size = parseInt($(this).css("font-size"));
      size = (size - 5) + "px";
      $(this).css({
        'font-size': size
      });
    });
  });
});
// End Change Font Size