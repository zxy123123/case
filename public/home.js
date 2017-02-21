function changesrc(obj){
    // alert(obj.src);
    //获取大图的对象
    var big = document.getElementById('big');
    //修改大图的SRC
    big.src = obj.src.replace('50_','');
}

function plus(){
    var ipt = document.getElementById('num');
    ipt.value = parseInt(ipt.value) + 1;
}

function minus(){
    var ipt = document.getElementById('num');
    ipt.value = parseInt(ipt.value) - 1;
    if (ipt.value < 1) {
        ipt.value = 1;
    };
}


