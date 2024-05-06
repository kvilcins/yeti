document.addEventListener('DOMContentLoaded', () => {
    const form = document.querySelector('.form--add-lot');
    const submitButton = form.querySelector('[type="submit"]');
    const photoLabel = form.querySelector('label[for="photo2"]');
    const photoPreview = form.querySelector('.preview__img img');
    const previewContainer = form.querySelector('.preview');
    const inputFileContainer = form.querySelector('.form__input-file');
    
    const checkFormForErrors = () => {
        let hasErrors = false;
        const inputs = form.querySelectorAll('input, select, textarea');
        
        inputs.forEach(input => {
            if (!input.checkValidity()) {
                input.classList.add('form__item--invalid');
                input.nextElementSibling.style.display = 'block';
                hasErrors = true;
            } else {
                input.classList.remove('form__item--invalid');
                input.nextElementSibling.style.display = 'none';
            }
        });
        
        if (hasErrors) {
            form.classList.add('form--invalid');
        } else {
            form.classList.remove('form--invalid');
        }
    };
    
    submitButton.addEventListener('click', event => {
        checkFormForErrors();
    });
    
    form.addEventListener('submit', event => {
        const inputs = form.querySelectorAll('input, select, textarea');
        inputs.forEach(input => {
            input.nextElementSibling.style.display = 'none';
        });
        photoLabel.style.display = 'none';
        form.reset(); // Сбрасываем значения формы
    });
    
    // Отображение выбранного изображения в превью
    const fileInput = form.querySelector('input[type="file"]');
    fileInput.addEventListener('change', event => {
        const file = event.target.files[0];
        const reader = new FileReader();
        
        reader.onload = function(e) {
            photoPreview.src = e.target.result;
            previewContainer.classList.add('form__item--uploaded');
            previewContainer.style.display = 'block';
            previewContainer.style.position = 'unset';
            inputFileContainer.classList.add('hidden');
        };
        
        reader.readAsDataURL(file);
    });
    
    // Проверка на наличие изображения при нажатии на кнопку "добавить лот"
    submitButton.addEventListener('click', event => {
        if (!fileInput.value) {
            photoLabel.style.display = 'block'; // Показываем метку, если изображение не выбрано
        }
    });
});