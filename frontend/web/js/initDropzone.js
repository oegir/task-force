Dropzone.autoDiscover = false;
files = [];
let dropzone = new Dropzone(`.create__file`, {
  url: function () {

  },
  uploadMultiple: true,
  acceptedFiles: 'image/*',
  autoProcessQueue: false
});
dropzone.on("addedfile", file => files.push(file));
