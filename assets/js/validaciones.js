$(document).ready(function () {
  const formName = $(".title-form").first().text().toLowerCase();

  $(".btn-cancelar").click(function (e) {
    e.preventDefault();

    const urlActual = window.location.href;

    let partesUrl = urlActual.split('/');

    partesUrl.pop();
    partesUrl.pop();

    partesUrl.push(`lista_${formName}.php`);
    
    const nuevaUrl = partesUrl.join('/');

    window.location.href = nuevaUrl;
  });

  $(".btn-guardar").click(function (e) {
    e.preventDefault();

    let validList = [];
    let sendList = {};

    $(".input-div").each(function () {
      const input = $(this).find("input");
      const label = $(this).find("label");
      const select = $(this).find("select");
      const textarea = $(this).find("textarea");

      const inputName = input.attr("name");
      const selectName = select.attr("name");
      const textareaName = textarea.attr("name");

      const name = inputName
        ? inputName
        : textareaName
        ? textareaName
        : selectName;

      if (
        input.val() === "" ||
        select.val() === "" ||
        textarea.val() === "" ||
        select.val() === null
      ) {
        input.addClass("validation-input");
        label.addClass("validation-label");
        select.addClass("validation-input");
        textarea.addClass("validation-input");

        validList.push(name);
      } else {
        input.removeClass("validation-input");
        label.removeClass("validation-label");
        select.removeClass("validation-input");
        textarea.removeClass("validation-input");

        sendList[name] = input.val();
      }
    });

    if (validList.length > 0) {
      alert(
        `Por favor, complete los campos: ${validList.join(
          ", "
        )}. \n\nSi sigue con problemas contactese con Brian Sanchez`
      );
    } else {
      fetch(`../../../MIPROYECTO/backend/${formName}.php`, {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify(sendList),
      }).then((response) => {
        if (!response.ok) {
          throw new Error("Ocurrió un error al guardar");
        }

        const urlActual = window.location.href;

        let partesUrl = urlActual.split('/');

        partesUrl.pop();

        partesUrl.push(`lista_${formName}.php`);
        
        const nuevaUrl = partesUrl.join('/');

        window.location.href = nuevaUrl;
      });
    }
  });
});
