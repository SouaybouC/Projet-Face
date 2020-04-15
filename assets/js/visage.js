
function changeImage(id) {

    var image = document.getElementById(id);
    var sPath = document.getElementById(id).src; //
    var s = sPath.substring(sPath.lastIndexOf("/"));


    if (image.src.match("imagesrouge")) {
        image.src = "{{ asset('images')}}"+s;
    }else{
        image.src = "{{ asset('imagesrouge') }}"+s;
    }
}

