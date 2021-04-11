let colorInput = document.querySelector('#color');
let hexInput = document.querySelector('#hex');

colorInput.addEventListener('input', () => {
    let color = colorInput.value;
    hexInput.value = color;

    document.querySelector("#tr0").style.backgroundColor = color;
    document.querySelector("#tr2").style.backgroundColor = color;
    document.querySelector("#tr4").style.backgroundColor = color;
});

let colorInput2 = document.querySelector('#color2');
let hexInput2 = document.querySelector('#hex2');

colorInput2.addEventListener('input', () => {
    let color2 = colorInput2.value;
    hexInput2.value = color2;

    document.querySelector("#tr1").style.backgroundColor = color2;
    document.querySelector("#tr3").style.backgroundColor = color2;
    document.querySelector("#tr5").style.backgroundColor = color2;
});