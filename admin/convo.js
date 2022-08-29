const convoContainer = document.querySelector("#convo-container")


const getConvo = async (user, other) => {
    try {
        const request = await fetch(`${BASE_URL}/messanger.php?convo=${user}&other=${other}`)
        const response = await request.json()
        return response
    } catch (err) {
        console.log(err.message)
        return []
    }
}

const getSubName = (name) => {
    console.table({name})
    const nameSplit = name.split(" ")
    if(nameSplit.length > 1) {
        return nameSplit.map(_name => _name.substring(0, 1).toUpperCase()).join(" ")
    }
    return name.substring(0, 1).toUpperCase()
}

const returnDateUnit = (hour) => hour >= 12 ? "PM" : "AM"

const setConvo = async () => {
    const ADMIN_ID = document.querySelector("[data-id]").value
    const OTHER_ID = document.querySelector("[name=OTHER_ID]").value
    const result = await getConvo(ADMIN_ID, OTHER_ID)
    console.table(result)

//     convoContainer.innerHTML = ""
//     if(result?.length) {
//         convoContainer.innerHTML = ""
//         const days = ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"]
//         result.forEach((message) => {
//             console.log(message)
//             const mainDate = new Date(Date.parse(message?.date))
//             const messageItem = document.createElement("div")
//             const isAdmin = ADMIN_ID == message.sender_id
//             messageItem.className = `flex items-start mb-4 last:mb-0`
//             messageItem.style.flexDirection = `${ isAdmin ? "row-reverse" : "row" }`
//             messageItem.innerHTML = `
//                 ${ (message?.attachment && message?.attachment != "null") && `
//                     ${ isAdmin ? 
//                         `
//                             <div class="flex shadow-sm ml-2 items-center justify-center bg-gray-200 rounded-full w-10 h-10 text-sm font-semibold uppercase text-gray-500">
//                             ${message?._admin?.name && getSubName(message?._admin?.name)}
//                             </div>
//                         ` 
//                         : 
//                         `
//                             ${message?.pic ? 
//                                 `
//                                 <img class="w-8 h-8 rounded-full mr-2" src="${message?.pic}" alt="${message?._sender?.firstname}" width="32" height="32">
//                             ` : `
//                                 <div class="flex shadow-sm mr-2 items-center justify-center bg-gray-200 rounded-full w-10 h-10 text-sm font-semibold uppercase text-gray-500">
//                                     ${ getSubName(message?._sender?.firstname + " " + message?._sender?.lastname) }
//                                 </div>
//                             `}
//                         ` }  
//                         <div>
//                             <div class="text-sm ${isAdmin ? "bg-indigo-500 text-white" : "bg-white text-gray-800" } p-3 rounded-lg border border-transparent shadow-md mb-1" style="border-top-right-radius: 0;">
//                                 ${JSON.parse(message?.attachment)?.forEach(file => `
//                                     <div class="flex items-center">
//                                         <svg class="w-6 h-6 fill-current text-gray-400 flex-shrink-0 mr-3" viewBox="0 0 24 24"><path d="M15 15V5l-5-5H2c-.6 0-1 .4-1 1v14c0 .6.4 1 1 1h12c.6 0 1-.4 1-1zM3 2h6v4h4v8H3V2z"></path></svg>
//                                         <a download="${file}" href="../attachment/${file}" class="text-sm underline ${ isAdmin ? "text-gray-200" : "text-gray-500" } font-semibold flex-1 ">
//                                             ${ file }
//                                         </a>
//                                     </div>
//                                 `)}
//                             </div>
//                         </div>
//                 ` }
//             ${isAdmin ? 
//                 `
//                     <div class="flex shadow-sm ml-2 items-center justify-center bg-gray-200 rounded-full w-10 h-10 text-sm font-semibold uppercase text-gray-500">
//                        ${message?._admin?.name && getSubName(message?._admin?.name)}
//                     </div>
//                 ` 
//                 : 
//                 `
//                     ${message?.pic ? 
//                     `
//                         <img class="w-8 h-8 rounded-full mr-2" src="${message?.pic}" alt="${message?._sender?.firstname}" width="32" height="32">
//                     ` : `
//                         <div class="flex shadow-sm mr-2 items-center justify-center bg-gray-200 rounded-full w-10 h-10 text-sm font-semibold uppercase text-gray-500">
//                             ${ getSubName(message?._sender?.firstname + " " + message?._sender?.lastname) }
//                         </div>
//                     `}
//                 ` }
//                     <div>
//                         <div class="text-sm ${isAdmin ? "bg-indigo-500 text-white" : "bg-white text-gray-800" } p-3 rounded-lg border border-transparent shadow-md mb-1" style="border-top-right-radius: 0;">
//                             ${message?.message}
//                         </div>
//                         <div class="flex items-center justify-between">
//                             <div class="text-xs text-gray-500 font-medium" title="${`${days[mainDate.getDay()]}, ${mainDate.getHours()}:${mainDate.getMinutes()} ${returnDateUnit(mainDate.getHours())}`}">
//                                 ${`${days[mainDate.getDay()]}, ${mainDate.getHours()}:${mainDate.getMinutes()} ${returnDateUnit(mainDate.getHours())}`}
//                             </div>
//                         </div>
//                     </div>
//                 `
//                 convoContainer.appendChild(messageItem)
//         })
//         const lastMessage = document.createElement("div")
//         lastMessage.id = "scrollToView"
//         convoContainer.appendChild(lastMessage)
//     }
}

setInterval(() => {
    setConvo()
}, 4000)
