const myslide=document.querySelectorAll('.myslider'),
        dot=document.querySelectorAll('.dot');

    let counter=1;
    slidefun(counter);

    let timer=setInterval(autoslide,8000);
    function autoslide(){
        counter+=1;
        slidefun(counter);
    }
    function plusSlides(n){
        counter+=n;
        slidefun(counter);
        resetTimer();
    }
    function currentSlide(n){
        counter=n;
        slidefun(counter);
        resetTimer();
    }
    function resetTimer(){
        clearInterval(timer);
        timer=setInterval(autoslide,8000);
    }
    function slidefun(n)
    {
        let i;
        for(i=0;i<myslide.length;i++)
        {
            myslide[i].style.display="none";
        }
        for(i=0;i<dot.length;i++)
        {
            dot[i].classList.remove('active');
        }
        if(n>myslide.length){
            counter=1;
        }
        if(n<1){
            counter=myslide.length;
        }
        myslide[counter-1].style.display="block";
        dot[counter-1].classList.add('active');
    }


    var swiper=new swiper(".popular-content",{
        slidesPerview:1,
        spaceBetween:10,
        autoplay:{
            delay:755500,
            disabledOnInteraction:false,
        },
        pagination:{
            el:".swipper-pagination",
            clickable:true,
        },
        navigation:{
            nextEl:".swiper-button-next",
            prevE1:".swiper-button-prev",
        },
        breakpoints:{
            280:{
                slidesPerview:1,
                spaceBetween:10,
            },
            320:{
                slidesPerview:1,
                spaceBetween:10,
            },
            510:{
                slidesPerview:1,
                spaceBetween:10,
            },
            758:{
                slidesPerview:1,
                spaceBetween:10,
            },
            900:{
                slidesPerview:1,
                spaceBetween:10,
            },
        },
    
    });