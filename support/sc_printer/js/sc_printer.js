const users = []


var table = $('#table-senior').DataTable({ 

    processing: true, 
    serverSide: true,
    order: [],
    deferRender: true,

    ajax: {
        url: 'Sc_printer/ajax_list',
        type: 'POST',
    },
    
    rowCallback: function(row, data ) {
        const id = data[0]
        const button = row.getElementsByTagName('button')[0]
        if(users.some((user) => user.id == id) ) {
            highlightTableRow(row)
            changeButton(button)
        }   
    },

    dom: "<'row'<'col-sm-6 col-md-6'l><'col-sm-6 col-md-6'f>>" +
         "<'row'<'col-sm-12't>>" +
         "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",

})

tableRowToArray()
printId()

function tableRowToArray() {
    const printList = document.getElementById('print-list')
    const tableSenior = document.getElementById('table-senior')
        .getElementsByTagName('tbody')[0]

    tableSenior.addEventListener('click', function(event) {
        const row = event.target.closest('tr')
        const button = event.target.closest('button')

        if(button) {
            const id = getTableCellData(row, 0)
            highlightTableRow(row)
            changeButton(button)

            if(! users.some((user) => user.id == id) ) {
                const profile = {
                    id:             getTableCellData(row, 0),
                    sc_id:          getTableCellData(row, 1),
                    family_name:    getTableCellData(row, 2),
                    given_name:     getTableCellData(row, 3),
                    middle_initial: getTableCellData(row, 4),
                    date_of_birth:  getTableCellData(row, 5),
                    gender:         getTableCellData(row, 6),
                    age:            getTableCellData(row, 7),
                    civil_status:   getTableCellData(row, 8),
                    purok:          getTableCellData(row, 9),
                    barangay:       getTableCellData(row, 10),
                    signature:      getTableCellData(row, 11),
                    picture:        getTableCellData(row, 12),
                    qr_code:        getTableCellData(row, 13),
                }

                users.push(profile)
                generateFrontId(profile)
                generateBackId(profile)
                writeToList(printList, {
                    id: profile.id, 
                    name: (`${profile.family_name} ${profile.given_name}`)
                })
                setCounter()
            }else {
                const userIndex = users.findIndex((user) => user.id == id)
                users.splice(userIndex, 1)
                removeFromList(printList, id)
                removeTemplate(id)
                setCounter()
            }

            // users.sort(compareValues('family_name'))
            console.log(users)

        }

    })

}

function removeTemplate(id) {
    const templates = Array.from(document.querySelectorAll(`[sc-id='${id}']`))
    templates.forEach((template) => {
        template.remove()
    })
}

function generateFrontId(user) {
    const templateHolder = document.getElementById('print-preview')

        // <div class="print-page">
    let seniorFrontTemplate = `
        <div sc-id="${user.id}" class="template-holder toggle-zoom">
            <div class="template-front">
                <img class="template-senior" src="support/sc_printer/img/template/front.jpg">
                <div class="absolute">
                    <span id="id-name" class="name">${user.given_name} ${user.family_name}</span>
                    <span id="id-address">${user.barangay}, ${user.purok}</span>
                    <span id="id-gender">${user.gender}</span>
                    <span id="id-dob">${user.date_of_birth}</span>
                    <span id="id-control">${user.sc_id}</span>
                    <img class="picture" src="support/sc_printer/img/profile/picture.jpg">
                </div>
            </div>
        </div>
    `

    templateHolder.innerHTML += seniorFrontTemplate
}

function generateBackId(user) {
    const templateHolder = document.getElementById('print-preview-back')

    let seniorBackTemplate = `
        <div sc-id="${user.id}" class="template-back-holder toggle-zoom">
            <img id="template-back" class="template-back" src="support/sc_printer/img/template/back.jpg">
        </div>
    `

    templateHolder.innerHTML += seniorBackTemplate
}

function compareValues(key, order = 'asc') {
    return function innerSort(a, b) {
        if (!a.hasOwnProperty(key) || !b.hasOwnProperty(key)) {
            return 0;
        }

        const varA = (typeof a[key] === 'string') ? a[key].toUpperCase() : a[key]
        const varB = (typeof b[key] === 'string') ? b[key].toUpperCase() : b[key]

        let comparison = 0

        if (varA > varB) {
            comparison = 1
        } else if (varA < varB) {
            comparison = -1
        }

        return (
            (order === 'desc') ? (comparison * -1) : comparison
        )
    }
}

function writeToList(nodeList, data) {
    const li = document.createElement('li')
    li.appendChild(document.createTextNode(data.id + ' ' + data.name))
    li.setAttribute('senior-id', data.id)
    nodeList.appendChild(li)
}

function removeFromList(nodeList, id) {
    const list = Array.from(nodeList.getElementsByTagName('li'))    
    const found = list.find((listValue) => {
        const currentId = listValue.getAttribute('senior-id')
        
        if(currentId == id) {
            return listValue   
        }

    })

    nodeList.removeChild(found)
}

function setCounter() {
    const counter = document.getElementById('counter')
    counter.innerHTML = `TOTAL: ${users.length}`
}

function getTableCellData(row, index) {
    return row.getElementsByTagName('td')[index].textContent
}

function highlightTableRow(row) {
    row.classList.toggle('highlight')
}

function changeButton(button) {
    const icon = button.children[0]

    if(button.classList.contains('btn-success')) {
        button.classList.remove('btn-success')
        button.classList.add('btn-danger')
        icon.classList.remove('fa-arrow-right')
        icon.classList.add('fa-times-circle')
    }else {
        button.classList.add('btn-success')
        button.classList.remove('btn-danger')
        icon.classList.remove('fa-times-circle')
        icon.classList.add('fa-arrow-right')
    }
}

function printId() {
    const btnPrintFront = document.getElementById('btn-print-front')
    const btnPrintBack = document.getElementById('btn-print-back')
    const iframePrint = document.getElementById('iframe-print')
    const templateBack = document.getElementById('template-back')

    const images = []
    
    btnPrintFront.addEventListener('click', function() {
        const templateFronts = Array.from(document.getElementsByClassName('template-front'))
        generateIds(templateFronts, 'front')                 
    })

    btnPrintBack.addEventListener('click', function() {
        const templateBacks = Array.from(document.getElementsByClassName('template-back'))
        generateIds(templateBacks, 'back')                 
    })

    function generateIds(templates, side) {
        if(users.length > 0) {
            startRendering()

            function renderImage(template) {
                return new Promise((resolve) => {
                    domtoimage.toJpeg(template).then(function (dataUrl) {
                        template.classList.toggle('flipped')
                        resolve(dataUrl)
                    })
                })
            }

            function startRendering() {

                let promises = []
                const a4Size =  [841.89, 595.28]
                const idSize = [247, 155.56]
                const doc = new jsPDF('l', 'pt', a4Size)
                const startX = idSize[0] + 20 
                const startY = idSize[1] + 20
                const startRow = idSize[1] + 20
                let col = 0
                let row = 0
                const margin = 35
                const topMargin = 20

                templates.forEach((template) => {
                    template.classList.toggle('flipped')
                    promises.push(renderImage(template))
                })

                Promise.all(promises).then((images) => {
                    const today = new Date()
                    const date = `${today.getMonth() + 1}/${today.getDate()}/${today.getFullYear()} `
                    const time = `${today.getHours()}:${today.getMinutes()}:${today.getSeconds()}`
                    let batch = 1 
                    let title = `${date} ${time} batch: ${batch}`

                    doc.text(35, 35, title)

                    images.forEach((image, index) => {

                        if(index == 9) {
                            row = 0
                            col = 0
                            doc.addPage()
                        }

                        if(side == 'front') {
                            console.log('front')
                            doc.addImage(images[index], 'JPEG', 
                                (startX * row) + margin ,
                                (startRow * col) + margin + topMargin, idSize[0], idSize[1]
                            )
                        }

                        if(side == 'back') {
                            console.log('back')
                            doc.addImage(images[index], 'JPEG', 
                                (569 - ((idSize[0] + 20) * row)),
                                (startRow * col) + margin + topMargin, idSize[0], idSize[1]
                            )
                        }

                        row++

                        if((index + 1) % 3 == 0) {
                            row = 0
                            col++
                        }
                        
                    })

                    docToIframe(doc, iframePrint)  
                    $('#modal-print').modal('toggle')
                })
            }
        }
    }
}

function renderImage(node) {
    domtoimage.toJpeg(node).then(function (dataUrl) {
        return dataUrl
    })
}

function docToIframe(doc, iframe) {
    const blob = doc.output('blob')
    const blobURL = URL.createObjectURL(blob)
    iframe.src = blobURL   
}

function saveDoc(doc, title) {
    // doc.save('Test.pdf')
}