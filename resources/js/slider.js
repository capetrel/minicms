import { tns } from "../../node_modules/tiny-slider/src/tiny-slider"

let sliders = document.querySelectorAll('.slider').forEach(function (element){
    let slider = tns({
        container: element,
        items: 1,
        slideBy: 'page',
        center: true,
        controlsPosition: 'bottom',
        controlsText: ['<', '>'],
        navPosition: "bottom",
        responsive: {
            640: {
                edgePadding: 20,
                gutter: 20,
                items: 2
            },
            700: {
                gutter: 30
            },
            900: {
                items: 3
            }
        }
    });
})



