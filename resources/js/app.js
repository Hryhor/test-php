import './bootstrap';
import './nouislider.min.js';


const rangeSlider = document.getElementById('range-slider');
const productPriceElements = document.querySelectorAll('.product-price__current');

if (rangeSlider) {
    noUiSlider.create(rangeSlider, {
        start: [100, 9999],
        connect: true,
        step: 1,
        range: {
            'min':[100],
            'max': [9999]
        }
    });

    const input0 = document.getElementById('input-0');
    const input1 = document.getElementById('input-1');
    const inputs = [input0, input1];

    rangeSlider.noUiSlider.on('update', function(values, handle) {
        inputs[handle].value = Math.round(values[handle]);
    });

    const setRangeSlider = (i, value) => {
        let arr = [null, null];
        arr[i] = value;

        rangeSlider.noUiSlider.set(arr);
    }

    inputs.forEach((el, index) => {
        el.addEventListener('change', (e) => {
            setRangeSlider(index, e.currentTarget.value);
        });
    })
}

const resetBtn = document.getElementById('reset-btn');
const filterForm = document.getElementById('filter-form');

resetBtn.addEventListener('click', function () {
    filterForm.action = "products";

    filterForm.submit();
});



