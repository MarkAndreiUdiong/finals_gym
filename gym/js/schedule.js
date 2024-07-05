document.getElementById('weight').addEventListener('input', calculateBMI);
document.getElementById('height').addEventListener('input', calculateBMI);

function calculateBMI() {
    let weight = document.getElementById('weight').value;
    let height = document.getElementById('height').value;

    if (weight && height) {
        let heightInMeters = height / 100;
        let bmi = (weight / (heightInMeters * heightInMeters)).toFixed(2);
        document.getElementById('bmi').value = bmi;
    } else {
        document.getElementById('bmi').value = '';
    }
}