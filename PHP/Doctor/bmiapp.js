const height = document.getElementById("height");
const weight = document.getElementById("weight");
const BMI = document.getElementById("bmi");
const calculate = document.getElementById("calculate");

calculate.addEventListener("click", () => {
  let mtr = height.value / 3.28;
  let kg = weight.value;
  let bmi = (kg / (mtr * mtr)).toFixed(1);

  BMI.textContent = bmi;

  height.value = "";
  weight.value = "";
});
