    // load post categry ajax requeyst
    function loadPostCate(data = ""){
        const xmlReq = new XMLHttpRequest();
        xmlReq.onreadystatechange = function(e){
            e.preventDefault();
            if(this.readyState == 4 && this.status == 200){
                document.getElementById("postCategory").innerHTML = xmlReq.responseText;
            }
        }
        xmlReq.open("GET","load-post-cate.php?postCateId="+data,true);
        xmlReq.send();
    }

