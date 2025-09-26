let mainImage = document.querySelector("#mainImg");
let subImage1 = document.querySelector("#img1");
let subImage2 = document.querySelector("#img2");
let subImage3 = document.querySelector("#img3");

let imageArray = [mainImage, subImage1, subImage2, subImage3];
// console.log(imageArray[(imageArray.length)-1].src);
// console.log(imageArray[0].src);
// console.log(imageArray[(imageArray.length)-3].src);
// console.log(imageArray[(imageArray.length)-2].src);

subImage1.addEventListener("click", function(){
    let temp = mainImage.src;
    mainImage.src = subImage1.src;
    subImage1.src = temp;
});

subImage2.addEventListener("click", function(){
    let temp = mainImage.src;
    mainImage.src = subImage2.src;
    subImage2.src = temp;
});

subImage3.addEventListener("click", function(){
    let temp = mainImage.src;
    mainImage.src = subImage3.src;
    subImage3.src = temp;
});
    
// setInterval(function(){
    
//     let random = Math.floor(Math.random() * 4);
//     mainImage.src = imageArray[random].src;

// }, 2000)

// for(let i = 0; i < imageArray.length; i++){
//     setInterval(function(){
//         let num = 4;
//         if(mainImage.src == imageArray[i].src){
//             mainImage.src = imageArray[(imageArray.length)-(num - 3)].src;
//             subImage1.src = imageArray[i].src;
//             subImage2.src = imageArray[(imageArray.length)-3].src;
//             subImage3.src = imageArray[(imageArray.length)-2].src;
//         }
//     }, 2000)

// }
    

