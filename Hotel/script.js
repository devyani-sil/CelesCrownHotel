
const quotes = [
  "Gym","Spa","Jacuzzi","Balcony","View","Wi-Fi","Parking","Breakfast"];

let currentIndex = 0;
let currentCharIndex = 0;
const quoteElement = document.getElementById("quote");

function typeQuote() {
  if (currentCharIndex < quotes[currentIndex].length) {
      quoteElement.textContent += quotes[currentIndex].charAt(currentCharIndex);
      currentCharIndex++;
      setTimeout(typeQuote, 100);
  } else {
      currentCharIndex = 0;
      currentIndex++;
      if (currentIndex >= quotes.length) {
          currentIndex = 0;
      }
      quoteElement.textContent = '';
      setTimeout(typeQuote, 2000);
  }
}

typeQuote();

function toggleAdditionalContent() {
  const additionalContent = document.querySelector('.additional-content');
  const aboutBtn = document.getElementById('about-btn');

  additionalContent.classList.toggle('hidden');

  if (additionalContent.classList.contains('hidden')) {
      aboutBtn.innerText = 'Read More...';
  } else {
      aboutBtn.innerText = 'Read Less';
  }
}
