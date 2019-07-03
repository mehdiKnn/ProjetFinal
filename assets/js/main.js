let url = window.location.href
switch (url) {
    case 'http://www.kannouni.fr/?page=informations' :
        let map
        let Pantin = {lat: 48.894533, lng: 2.409630}
        let parent = document.getElementById('contenu')
        let parentRemove = document.getElementById('allContent')

    function initMap(location, mark) {
        map = new google.maps.Map(document.getElementById('gmap'), {
            center: location,
            zoom: 15
        });
        let marker = new google.maps.Marker({
            position: mark,
            map: map,
            title: 'Hello World!'
        })
    }

        initMap(Pantin, Pantin)

        let closeBouton = document.getElementById('boutonClose')
        let modal = document.getElementById('modalCenter')
        let modalToFill = document.getElementById('contenu')


        closeBouton.addEventListener('click',function () {
            closeModal(modal)
        })

        let openModal = function(modal){
            modal.style.display='flex'
        }

        let closeModal = function(modal){
            let toDelete =  document.querySelectorAll('.closeDelete')
            toDelete.forEach(function (element) {
                element.remove()
            })
            modal.style.display='none'
        }

        const getServices = function () {

            fetch('./assets/ajax/servicesLoad.php', {
                method: 'POST',
                headers: new Headers(),
            })
                .then((res) => res.json())
                .then((ress) => {
                    ress.forEach(function (element) {
                        displayServices(element.name, element.image, element.id)
                    })
                })
        }

        const displayServices = function (name, img, id) {
            let parent  = document.getElementById('firstSub')
            let parentMobile = document.getElementById('parentMobile')
            let div = document.createElement('div')
            let span = document.createElement('span')

            div.classList.add("services")

            let nodeName = document.createTextNode(name)

            div.style.backgroundImage = "url('./assets/img/services/" + img + "')"

            span.appendChild(nodeName)
            div.appendChild(span)

            screen.width > 800 ?  parent.appendChild(div) : parentMobile.appendChild(div)




            div.addEventListener('click', function () {
                update()
                modalContent(id)
                openModal(modal)

            })
        }


        const modalContent = function (id) {
            let formDate = new FormData()
            formDate.append('id',id )

            fetch('./assets/ajax/modalServices.php', {
                method: 'POST',
                headers: new Headers(),
                body: formDate
            })
                .then((res) => res.json())
                .then((ress) => {
                    console.log(ress)
                    ress.forEach(function (element) {
                        fillModal(element.name, element.lat, element.longi, element.schedule, element.address)
                    })

                })

        }

        const fillModal = function (title,lat,longi, schedule, address) {

            let div = document.createElement('div')
            div.classList.add('modalInfo')
            let spanTitle = document.createElement('h4')
            let spanSchedule = document.createElement('span')
            let spanAddress = document.createElement('span')
            let spanEvent = document.createElement('span')
            spanEvent.style.color = 'red'
            spanEvent.style.cursor = 'help'

            let nodeTitle = document.createTextNode(title)
            let nodeSchedule = document.createTextNode("Horaires: "+schedule)
            let nodeAddress = document.createTextNode(address)
            let nodeEvent  = document.createTextNode("voir sur la carte")

            spanTitle.appendChild(nodeTitle)
            spanAddress.appendChild(nodeAddress)
            spanSchedule.appendChild(nodeSchedule)
            spanEvent.appendChild(nodeEvent)

            div.appendChild(spanTitle)
            div.appendChild(spanAddress)
            div.appendChild(spanEvent)
            div.appendChild(spanSchedule)

            parent.appendChild(div)
            parentRemove.appendChild(div)
            let location = {lat: parseFloat(lat), lng: parseFloat(longi)}
            console.log(location)

            spanEvent.addEventListener('click',function () {
                initMap(location, location)
            })
        }

        const update = function(){

            let child = document.querySelectorAll('.modalInfo')

            child.forEach(function (element) {
                parentRemove.removeChild(element)
            })


        }

        getServices()


        break;

    case 'http://www.kannouni.fr/?page=events' :
        let date = document.getElementById('datepickr')
        let closeBoutonEvent = document.getElementById('boutonClose')
        let modalEvent = document.getElementById('modalCenter')
        let modalEventToFill = document.getElementById('contenu')
        let event = document.querySelectorAll('.event')

        event.forEach(function (element) {
            element.addEventListener('click', function () {
                openModalEvent(modalEvent)
            })
        })


        closeBoutonEvent.addEventListener('click',function () {
            closeModalEvent(modalEvent)
        })

        let openModalEvent = function(modal){
            modal.style.display='flex'
        }

        let closeModalEvent = function(modal){
            let toDelete =  document.querySelectorAll('.closeDelete')
            toDelete.forEach(function (element) {
                element.remove()
            })
            modal.style.display='none'
        }

        date.addEventListener('change', function () {
            getEvent(date.value)
        })

        const getEvent = function (date) {
            let formDate = new FormData()

            formDate.append('date',date )
            fetch('./assets/ajax/eventsLoad.php', {
                method: 'POST',
                headers: new Headers(),
                body: formDate
            })
                .then((res) => res.json())
                .then((ress) => {
                    updateEvent()

                    ress.forEach(function (element) {
                        displayEvent(element.name, element.date, element.summary, element.id)
                    })
                })
        }

        const displayEvent = function (name, date, summary, id) {
            let parent = document.getElementById('subContainer')

            let divEvent = document.createElement('div')
            divEvent.classList.add('event')
            let spanName = document.createElement('span')
            let spanDate = document.createElement('span')
            let spanSummary = document.createElement('span')


            let nodeName = document.createTextNode(name)
            let nodeDate = document.createTextNode(date)
            let nodeSummary = document.createTextNode(summary)

            spanName.appendChild(nodeName)
            spanDate.appendChild(nodeDate)
            spanSummary.appendChild(nodeSummary)

            divEvent.appendChild(spanName)
            divEvent.appendChild(spanDate)
            divEvent.appendChild(spanSummary)
            divEvent.addEventListener('click', function () {
                openModalEvent(modalEvent)
                modalEventContent(id)
            })


            parent.appendChild(divEvent)
        }

        const updateEvent = function () {
            let parent = document.getElementById('subContainer')
            let child = document.querySelectorAll('.event')

            console.log(child)

            child.forEach(function (element) {
                parent.removeChild(element)
            })

            let title  = document.getElementById('dynaTitle')
            let datePickr = document.getElementById('datepickr')

            title.innerHTML = "Les événement du "+ datePickr.value
        }



        const initEvent = function () {
            fetch('./assets/ajax/initContent.php', {
                method: 'POST',
                headers: new Headers(),
            })
                .then((res) => res.json())
                .then((ress) => {
                    console.log(ress)

                    ress.forEach(function (element) {
                        displayEvent(element.name, element.date, element.summary, element.id)
                    })

                })
        }

        const modalEventContent = function (id) {
            let formDate = new FormData()
            formDate.append('id',id )

            fetch('./assets/ajax/modalContent.php', {
                method: 'POST',
                headers: new Headers(),
                body: formDate
            })
                .then((res) => res.json())
                .then((ress) => {
                    console.log(ress)
                    fillEventModal(ress.title, ress.name, ress.content)
                })

        }

        const fillEventModal = function (title,name,content) {

            let div = document.createElement('div')
            let spanContent = document.createElement('span')
            let nodeContent = document.createTextNode(content)
            spanContent.classList.add('closeDelete')

            let spanName = document.createElement('H1')
            let nodeName = document.createTextNode(title)
            spanName.classList.add('closeDelete')

            let img = document.createElement('img')
            img.src = "./assets/img/event/"+name;
            img.classList.add('closeDelete')

            spanContent.appendChild(nodeContent)
            spanName.appendChild(nodeName)

            div.appendChild(spanName)
            div.appendChild(spanContent)
            div.classList.add('closeDelete')
            div.id = "modalContent"

            modalEventToFill.appendChild(img)
            modalEventToFill.appendChild(div)

        }

        initEvent()
        break;

    case 'http://www.kannouni.fr/?page=contact':
        let catChoice = document.getElementById('selectCat')
        let subCatChoice = document.getElementById('selectSubCat')

        let voirie = ['mobiliers', 'revêtements', 'signalisations au sol']
        let signalisation = ['feux tricolores', 'panneaux directionnels', 'panneaux sectorisations']
        let espacesVerts = ['parcs', 'squares', 'aires de jeu', 'espaces ornementaux']
        let proprete = ['poubelles', 'ramassages', 'dégradations', 'propreté de la voirie']

        voirie.forEach(function (element) {
            let option = document.createElement('option')
            option.text = element
            subCatChoice.add(option)
        })


        catChoice.addEventListener('change', function () {
            for(let i = subCatChoice.options.length - 1 ; i >= 0 ; i--)
            {
                subCatChoice.remove(i);
            }
            console.log(catChoice.value)
            if (catChoice.value == "Voirie"){
                voirie.forEach(function (element) {
                    let option = document.createElement('option')
                    option.text = element
                    subCatChoice.add(option)
                })
            }
            if (catChoice.value == 'Signalisation'){
                signalisation.forEach(function (element) {
                    let option = document.createElement('option')
                    option.text = element
                    subCatChoice.add(option)
                })
            }
            if (catChoice.value == 'Espaces verts'){
                espacesVerts.forEach(function (element) {
                    let option = document.createElement('option')
                    option.text = element
                    subCatChoice.add(option)
                })
            }
            if (catChoice.value == 'Propreté'){
                proprete.forEach(function (element) {
                    let option = document.createElement('option')
                    option.text = element
                    subCatChoice.add(option)
                })
            }
        })

        let collapse = document.getElementsByClassName("collHover");
        let i;

        for (i = 0; i < collapse.length; i++) {
            collapse[i].addEventListener("click", function() {
                this.classList.toggle("active");
                let content = this.nextElementSibling;
                if (content.style.maxHeight) {
                    content.style.maxHeight = null;
                } else {
                    content.style.maxHeight = content.scrollHeight + "px";
                }
            })
        }

        let inputFirst = document.getElementById('inputFirst')
        let labelFirst  = document.getElementById('labelFirst')

        let inputNameContact = document.getElementById('inputNameContact')
        let labelNameContact  = document.getElementById('labelNameContact')

        let inputFirstContact = document.getElementById('inputFirstContact')
        let labelFirstContact  = document.getElementById('labelFirstContact')


        let inputSubject = document.getElementById('inputSubject')
        let labelSubject  = document.getElementById('labelSubject')

        let inputName = document.getElementById('inputName')
        let labelName  = document.getElementById('labelName')

        const labelInputAnim = function(label, input){
            input.addEventListener('focus', function () {
                label.style.transform = "translateY(-20px)"
                label.style.transition =" 0.3s cubic-bezier(0.25, 0.8, 0.5, 1)"
                label.style.fontSize="13px"
                input.style.opacity = "1"
            })


            input.addEventListener('blur', function () {
                if (input.value==="") {
                    label.style.transform = "translateY(0px) "
                    label.style.transition =" 0.3s cubic-bezier(0.25, 0.8, 0.5, 1)"
                    label.style.fontSize="16px"
                    input.style.opacity = "0"
                }
            })
        }

        labelInputAnim(labelFirst, inputFirst)
        labelInputAnim(labelName, inputName)
        labelInputAnim(labelSubject, inputSubject)
        labelInputAnim(labelNameContact, inputNameContact)
        labelInputAnim(labelFirstContact, inputFirstContact)

        sendContact = document.getElementById('contact')
        let subject= document.getElementById('inputSubject')
        let name = document.getElementById('inputNameContact')
        let firstname = document.getElementById('inputFirstContact')
        let content =document.getElementById('questionContact')

        sendContact.addEventListener('click',function () {
            console.log(content.value)
            sendFormContact(name.value, firstname.value,  subject.value, content.value)
            name.value=''
            firstname.value= ''
            subject.value =''
            content.value=''
        })

        const sendFormContact = function (name, firstname, subject, content) {
            let formDate = new FormData()
            formDate.append('name',name )
            formDate.append('firstname',firstname )
            formDate.append('subject',subject )
            formDate.append('content',content )
            fetch('./assets/ajax/sendFormContact.php', {
                method: 'POST',
                headers: new Headers(),
                body: formDate
            })
                .then((res) => res.json())
                .then((ress) => {

                })

        }

        let nameSignal  = document.getElementById('inputName')
        let firsNameSignal = document.getElementById('inputFirst')
        let contentSignal  = document.getElementById('questionSignal')
        let sendSignal = document.getElementById('signal')
        sendSignal.addEventListener('click',function () {
            console.log(contentSignal)
            console.log(contentSignal.value)
            sendFormSignal(catChoice.value, subCatChoice.value,  nameSignal.value, firsNameSignal.value,contentSignal.value)
            contentSignal.value= ''
            nameSignal.value =''
            firsNameSignal.value=''
        })

        const sendFormSignal = function (categorie, subcategorie, name, firstname, content) {
            let formDate = new FormData()
            formDate.append('name',name )
            formDate.append('firstname',firstname )
            formDate.append('categorie',categorie )
            formDate.append('content',content )
            formDate.append('subcategorie',subcategorie )
            fetch('./assets/ajax/sendFormSignal.php', {
                method: 'POST',
                headers: new Headers(),
                body: formDate
            })
                .then((res) => res.json())
                .then((ress) => {

                })

        }

        break;

    case 'http://www.kannouni.fr/?page=login':

        let inputLogin = document.getElementById('inputLogin')
        let labelLogin  = document.getElementById('labelLogin')

        let inputMdp = document.getElementById('inputMdp')
        let labelMdp  = document.getElementById('labelMdp')

        const labelInputAnimLog = function(label, input){
            input.addEventListener('focus', function () {
                label.style.transform = "translateY(-20px)"
                label.style.transition =" 0.3s cubic-bezier(0.25, 0.8, 0.5, 1)"
                label.style.fontSize="13px"
                input.style.opacity = "1"
            })


            input.addEventListener('blur', function () {
                if (input.value==="") {
                    label.style.transform = "translateY(0px) "
                    label.style.transition =" 0.3s cubic-bezier(0.25, 0.8, 0.5, 1)"
                    label.style.fontSize="16px"
                    input.style.opacity = "0"
                }
            })
        }

        labelInputAnimLog(labelLogin, inputLogin)
        labelInputAnimLog(labelMdp, inputMdp)

        break;
}

let displayMenu = document.getElementById('displayMenu')
let closeMenu = document.getElementById('closeBouton')
let nav = document.getElementById('navMobile')
let main = document.getElementById('main')
let section = document.getElementById('section')

const activate = function () {

    displayMenu.style.animation="fadeout 1s forwards"
    displayMenu.style.display='none'

    nav.style.display="block"
    nav.style.animation="fadein 1s forwards"

    closeMenu.style.display="flex"
    closeMenu.style.animation="fadein 1s forwards"

    main.style.filter="grayscale(1)"
    section.style.filter="grayscale(1)"
}

const desactivate = function () {

    nav.style.animation="fadeout 1s forwards"
    nav.style.display="none"

    closeMenu.style.animation="fadeout 1s forwards"
    closeMenu.style.display="none"

    displayMenu.style.animation="fadein 1s forwards"
    displayMenu.style.display="flex"

    main.style.filter="none"
    section.style.filter="none"

}

displayMenu.addEventListener('click', function () {
    activate()
})

closeMenu.addEventListener('click', function () {
    desactivate()
})



