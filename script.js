client = filestack.init(Your_API_Key);

const links = document.getElementById('links');

const addLink = function(file) {
    const link = document.createElement('a');
    link.innerHTML = file.url;
    link.href = file.url;  
    links.appendChild(link); 
};

client.pick({
  accept: 'image/*',
  fromSources:  ['local_file_system','facebook','googledrive','instagram','dropbox','imagesearch','webcam',],
  maxSize: 1024*2024,
  maxFiles: 3,
}).then(
  function(result) {
    result.filesUploaded.forEach(function(file) {
        addLink(file)
    });
});
