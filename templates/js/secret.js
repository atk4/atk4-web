$.each({
    myfunc: function(a){
        alert('myfunc: '+a);
    },
    mysum: function(foo,bar){
        return foo+bar+1;
    },
},$.univ._import);

