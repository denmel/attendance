let tabel = document.getElementById("tabel").tBodies[0]
let footer = document.getElementById("tabel").tFoot
let STATE = ['present', 'absent', 'ill']
let state = []
let children_count;
let days_count;
window.addEventListener("load", () => {
    children_count = tabel.rows.length
    days_count = tabel.rows[0].cells.length - 7
    recalc_table()
})

function recalc_table() {
    Array.from(tabel.rows).forEach(row => {
        row.cells[days_count + 3].innerHTML = row.querySelectorAll('.ill').length || ''
        row.cells[days_count + 4].innerHTML = row.querySelectorAll('.absent').length || ''
        row.cells[days_count + 5].innerHTML = row.querySelectorAll('.present').length || ''
    })
    for(let i=0;i<days_count;i++){
        let value= tabel.querySelectorAll(`tr td:nth-child(${i+4}).present`).length
        if (tabel.rows[0].cells[i+3].className !== 'weekend') {
            footer.rows[0].cells[i + 3].innerHTML = value
            footer.rows[1].cells[i + 3].innerHTML = (children_count - value)
        }
    }
    for(let i=3;i<6;i++) {
        footer.rows[0].cells[days_count + i].innerHTML = Array.from(tabel.querySelectorAll(`tr td:nth-child(${days_count + i + 1})`)).reduce((s, e) => {
            return s + Number(e.innerHTML)
        }, 0)||''

    }
}

tabel.addEventListener("click", (e) => {
    if (e.target.tagName === 'TD' && e.target.cellIndex > 2 && e.target.cellIndex < 34) {
        let cur = e.target.className
        if (cur !== 'weekend') {
            let ind = (STATE.indexOf(cur) + 1) % 3
            e.target.className = STATE[ind]
            recalc_table()
        }
    }
})

