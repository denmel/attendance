let groups=document.getElementById("groups")
let children_rows=Array.from(document.getElementById("children_table").tBodies[0].rows)
let current_group = '';
let item_window=document.getElementById("item-window")
groups.addEventListener("change",e=>{
    if (e.target.tagName === 'INPUT' && current_group!==groups.elements.group.value) {
        current_group = groups.elements.group.value
        children_rows.map(row=>{
            if (row.dataset.idgroup === current_group)
                row.style.display = "table-row";
            else
                row.style.display = "none";
        })
    }
})

document.getElementById("add-child").addEventListener("click",()=>{
    item_window.classList.add("show")
    })

Array.from(document.getElementsByClassName('btn-close')).forEach(e=>{
    e.addEventListener("click", e=>{
        e.target.closest('.modal').classList.remove('show')
    })
})