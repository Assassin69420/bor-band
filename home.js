const text = document.querySelector('h3')

const fact = 
    [
        {
          text: "People who ride on roller coasters have a higher chance of having a blood clot in the brain"
        },
        {
          text: "Adolf Hitler was one of the people that was responsible in the creation of the Volkswagen Beetle. He came up with the idea of producing a car that was cheap enough for the average German working man to afford."
        },
        {
          text: "Benjamin Franklin invented the rocking chair."
        },
        {
          text: "Colgate faced a big obstacle marketing toothpaste in Spanish speaking countries. Colgate translates into the command \"go hang yourself.\""
        },
        {
          text: "The shortest war in history was between Zanzibar an England in 1896. Zanzibar surrendered after 38 minutes"
        },
        {
          text: "Stewardesses is one of the longest words typed with only the left hand"
        },
        {
          text: "Coca-cola used to use the slogan \"Good to the last drop,\" in 1908. This slogan was later used by Maxwell House"
        },
        {
          text: "A Connecticut Toy maker, Herobuilders, sells action figures of President George W. Bush, Islamic militant Osama bin Laden, New York Mayor Rudolph Giuliani and British Prime Minister Tony Blair, which are all major figures tied to the September 11, 2001 WTC attacks"
        },
        {
          text: "Olive oil can help in lowering cholesterol levels and decreasing the risk of heart complications"
        },
        {
          text: "On average 1,668 gallons of water are used by each person in the United States daily"
        },
        {
          text: "In an average lifetime, a person will spend 4 years travelling in an automobile and six months waiting at a red light."
        },
        {
          text: "Babies that are exposed to cats and dogs in their first year of life have a lower chance of developing allergies when they grow older"
        },
        {
          text: "The Atlantic Ocean is saltier than the Pacific Ocean"
        },
        {
          text: "Printed on the tablet being held by the Statue of Liberty is July IV, MDCCLXXVI"
        },
        {
          text: "Many of the stars that were in the Poltergeist Trilogy had strange deaths"
        },
        {
          text: "After the Eiffel Tower was built, one person was killed during the installation of the lifts. No one was killed during the actual construction of the tower"
        },
        {
          text: "The fins of the Spiny Dogfish Shark are sometimes used as sandpaper for wood products"
        },
        {
          text: "In 1980, there was only one country in the world with no telephones - Bhutan"
        },
        {
          text: "A crocodile can run up to a speed of 11 miles per hour"
        },
        {
          text: "Minimum wage was 0.25 per hour when it was first enacted in 1938"
        },
        {
          text: "In Britain, there are approximately 50,000 pubs with 17,000 different names"
        },
        {
          text: "The stage were the television sitcom \"Friends\" is shot on is said to be haunted"
        },
        {
          text: "The first American celebration of St. Patricks Day was at Boston in 1737"
        },
        {
          text: "Most American women have their first baby when they are 24.3 years old"
        },
        {
          text: "Three years after a person quits smoking, there chance of having a heart attack is the same as someone who has never smoked before"
        },
        {
          text: "If a cockroach breaks a leg it can grow another one"
        },
        {
          text: "It requires 63 feet of wire to make a Slinky toy"
        },
        {
          text: "Men sweat more than women. This is because women can better regulate the amount of water they lose"
        },
        {
          text: "The city of Chicago has the only post office in the world where you can drive your car through"
        },
        {
          text: "The head of a jellyfish is called the \"Bell.\""
        }
      ]

let random;

function randomFact(){
    let i = Math.floor(Math.random() * fact.length)
    return fact[i].text;
}

text.innerText = randomFact();
console.log(text)
$(document).ready(function() {
    randomFact();
    text.innerText = randomFact();
});