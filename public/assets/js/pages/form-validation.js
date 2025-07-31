'use strict';
(function () {
  // Inisialisasi Bouncer
  var bouncer = new Bouncer('[data-validate]', {
    disableSubmit: true, // kita submit manual setelah validasi sukses
    customValidations: {
      valueMismatch: function (field) {
        var selector = field.getAttribute('data-bouncer-match');
        if (!selector) return false;
        var otherField = field.form.querySelector(selector);
        if (!otherField) return false;
        return otherField.value !== field.value;
      }
    },
    messages: {
      valueMismatch: function (field) {
        var customMessage = field.getAttribute('data-bouncer-mismatch-message');
        return customMessage ? customMessage : 'Please make sure the fields match.';
      }
    }
  });

  // Scroll ke error pertama saat form tidak valid
  document.addEventListener('bouncerFormInvalid', function (event) {
    window.scrollTo(0, event.detail.errors[0].offsetTop);
  }, false);

  // Submit manual saat form valid
  document.addEventListener('bouncerFormValid', function () {
    const form = document.getElementById('validate-me');
    if (!form) {
      console.error('Form with id "validate-me" not found');
      return;
    }

    console.log('Form valid event triggered. Submitting...');
    form.submit(); // atau form.requestSubmit() jika perlu trigger native handler
  });

  // Tangkap event submit dan validasi manual
  document.getElementById('validate-me').addEventListener('submit', function (e) {
    e.preventDefault(); // cegah submit dulu
    bouncer.validate(this); // trigger validasi manual
  });

})();
