let groups=document.getElementById("groups")
let children_rows=Array.from(document.getElementById("children_table").tBodies[0].rows)
let current_group = '';
let modal_window=document.getElementById("modal-window")
let group_window=document.getElementById("group-window")
let child_window=document.getElementById("child-window")
let caption = modal_window.getElementsByClassName('caption')[0]
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
    modal_window.classList.add("show")
    child_window.classList.add("show")
    caption.innerHTML='Добавить ребенка'
    })
document.getElementById("add-group").addEventListener("click",()=>{
    modal_window.classList.add("show")
    group_window.classList.add("show")
    caption.innerHTML='Добавить группу'
})

Array.from(document.getElementsByClassName('btn-close')).forEach(e=>{
    e.addEventListener("click", e=>{
        modal_window.classList.remove("show")
        child_window.classList.remove("show")
        group_window.classList.remove("show")
    })
})