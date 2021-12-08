let map = document.querySelector('#map');
let paths = map.querySelectorAll('.map__image a');
let links = map.querySelectorAll('.map__list a');

if(NodeList.prototype.forEach === undefined){
    NodeList.prototype.forEach = function (callback){
        [].forEach.call(this,callback);
    }
}

/*Hover area */

let activeArea = function(id) {
    map.querySelectorAll('.is-active').forEach(function(item){
        item.classList.remove('is-active');
    })

    if(typeof(id) != undefined){
        document.getElementById('list-' + id).classList.add('is-active');
        document.getElementById('MX-' + id).classList.add('is-active');
    }
}

/*Hover map or list */
paths.forEach(
    function (path){
        path.addEventListener('mouseenter', function(e){
            let id = this.id.replace('MX-',''); //obtenemos solo el nombre del estado
            activeArea(id);
           
        })
    }
);

links.forEach(
    function(link){
        link.addEventListener('mouseenter', function(e){
            let id = this.id.replace('list-',''); //obtenemos solo el nombre del estado
            activeArea(id);
    })
});

map.addEventListener('mouseover', function(e){
    activeArea(); //id is undefined so we only restare the hover
})


/*Select list or map */
/*Modal when you click an item on map or list */
const overlay = document.getElementById('overlay');
const closeModalButtons = document.querySelectorAll('[data-close-button]');

paths.forEach(
    function (path){
        path.addEventListener('click', function(e){
            const modal = document.querySelector('.modal');
            openModal(modal);
            console.log('hola presione');
        })
    }
);

links.forEach(
    function(link){
        link.addEventListener('click', function(e){
            const modal = document.querySelector('.modal');
            openModal(modal);
    })
});

overlay.addEventListener('click', () =>{
    const modals = document.querySelectorAll('.modal.active');
    modals.forEach(modal=>{
        closeModal(modal);
    })
})

closeModalButtons.forEach(button =>{
    button.addEventListener('click', () =>{
        const modal = button.closest('.modal');
        closeModal(modal);
    })
})

const openModal = () =>{
    if(modal == null) return
    modal.classList.add('active');
    console.log(modal.classList);
    overlay.classList.add('active');
}

const closeModal = () =>{
    if(modal == null) return
    modal.classList.remove('active');
    overlay.classList.remove('active');
}







