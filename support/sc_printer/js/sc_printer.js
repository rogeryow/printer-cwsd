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

    columnDefs: [
        {
            'targets': [0],
            'searchable': false
        },
        {
            targets: [1],
            width: '50px',
        },
        {
            targets: [2],
            width: '20%',
        },
        {
            'targets': [4],
            'searchable': false
        },
        {
            'targets': [5],
            'searchable': false
        },
        {
            'targets': [6],
            'searchable': false
        },
        {
            'targets': [7],
            'searchable': false
        },
        {
            'targets': [8],
            'searchable': false
        },
        {
            'targets': [9],
            'searchable': false
        },
        {
            'targets': [10],
            'searchable': false
        },
        {
            'targets': [11],
            'searchable': false
        },
        {
            'targets': [12],
            'searchable': false
        },
    ],  

    dom: "<'row'<'col-sm-6 col-md-6'l><'col-sm-6 col-md-6'f>>" +
         "<'row'<'col-sm-12't>>" +
         "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",

})

tableRowToArray()
printId()

function tableRowToArray() {
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

            }else {
                const userIndex = users.findIndex((user) => user.id == id)
                users.splice(userIndex)
            }

            console.log(users)

        }

    })

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
    const btnPrint = document.getElementById('btn-print')
    const iframePrint = document.getElementById('iframe-print')
    const images = []

    btnPrint.addEventListener('click', function() {
        if(users.length > 0) {
            
                var node = document.getElementById('back')

                function renderImage(value) {
                    return new Promise((resolve) => {
                        domtoimage.toJpeg(node).then(function (dataUrl) {
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

                    users.forEach((user, index) => {
                        promises.push(renderImage(node))
                    })

                    Promise.all(promises).then((images) => {
                    
                        images.forEach((image, index) => {

                            if(index == 9) {
                                row = 0
                                col = 0
                                doc.addPage()
                            }

                            doc.addImage(images[index], 'JPEG', 
                                (startX * row) + 10 ,
                                (startRow * col) + 10, idSize[0], idSize[1]
                            )

                            row++

                            if((index + 1) % 3 == 0) {
                                row = 0
                                col++
                            }
                            
                        })

                        docToIframe(doc, iframePrint)  

                        $('#modal-print').modal('toggle')

                    }).catch((error) => {
                        console.log(error)
                    })
                }
    
                startRendering()
        }
    })
}

function renderImage(node) {
    domtoimage.toJpeg(node).then(function (dataUrl) {
        return dataUrl
    })
}

// function normalizeTemplates() {
//     const templates = Array.from(document.getElementsByClassName('template-senior'))
//     templates.forEach((template) => {
//         template.style.width = '247px'
//     })
// }

function docToIframe(doc, iframe) {
    const blob = doc.output('blob')
    const blobURL = URL.createObjectURL(blob)
    iframe.src = blobURL   
}

function saveDoc(doc, title) {
    // doc.save('Test.pdf')
}