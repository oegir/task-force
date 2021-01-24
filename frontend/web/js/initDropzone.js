(() => {
  // Ссылка на кнопку отправки формы
  const btn = document.querySelector(`#submit-btn`);
  // Массив отправляемых файлов
  const files = [];
  // Перехватываем событие нажатия на кнопку отправки
  window.addEventListener(`load`, () => {
    btn.addEventListener(`click`, evt => {
      // Предотвращем немедленную отправку формы по нажатию кнопки "Отправить"
      evt.preventDefault();
      // Вызываем обработку отправки формы
      window.sendFiles(document.querySelector(`#task-form`), files);
    });
  });

  /**
   * Функция отправки формы
   *
   * @param {HTMLFormElement} form
   * @param {Array} files
   */
  window.sendFiles = (form, files) => {
    // Если файлов нет просто отправляем форму
    if (files.length === 0) {
      return form.submit();
    }
    // Создаем объект данных формы на основе формы со страницы
    const formData = new FormData(form);

    // Добавляем файлы в объект данных формы
    files.forEach(it => formData.append('TaskForm[file][]', it));
    // Отправляем данные
    $.ajax({
      url: window.location.href,
      method: `POST`,
      cache: false,
      contentType: false,
      processData: false,
      data: formData,
      success: function () {
        form.submit();
      }
    });
  };

  // Настройки обекта Dropzone
  Dropzone.autoDiscover = false;
  let dropzone = new Dropzone(`.create__file`, {
    url: function () {
    },
    uploadMultiple: true,
    acceptedFiles: 'image/*',
    autoProcessQueue: false
  });
  dropzone.on("addedfile", file => files.push(file));
})();
