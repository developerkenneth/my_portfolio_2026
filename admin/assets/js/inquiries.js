const tableBody = document.querySelector("#table-body");
const pagesContainer = document.querySelector("#pages-container");

let totalPages ;
let currentPage ;

function readableDate(rawDate) {

    // Convert space to 'T' so JS engine parses it reliably as ISO
    const date = new Date(rawDate.replace(" ", "T"));

    const options = {
        year: 'numeric',
        month: 'long',
        day: 'numeric',
        hour: '2-digit',
        minute: '2-digit'
    };

    return date.toLocaleDateString('en-US', options)
   
}


const displayinquires = (posts) => {
    let tableContent = "";
    posts.forEach((post) => {
        const initial = post.name.slice(0, 1);
        tableContent += `
                    <tr class="hover:bg-surface-bright/30 transition-colors group">
                    <td class="px-6 py-5">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-lg bg-primary/10 flex items-center justify-center text-primary font-bold text-xs">${initial}</div>
                            <div>
                                <p class="text-sm font-bold text-on-background">${post.name}</p>
                                <p class="text-xs text-on-surface-variant">${post.email}</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-5">
                        <p class="text-sm font-medium text-on-background">${post.ip_address}</p>
                        <p class="text-xs text-on-surface-variant truncate max-w-xs">${post.message.slice(0, 20)}...</p>
                    </td>
                    <td class="px-6 py-5 text-sm text-on-surface-variant">${readableDate(post.created_at)}</td>
                    <td class="px-6 py-5">
                        <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-primary/10 text-primary border border-primary/20 animate-pulse">New</span>
                    </td>
                    <td class="px-6 py-5 text-right">
                        <div class="flex justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                            <button class="p-2 rounded-lg hover:bg-blue-500/10 text-blue-500 transition-colors">
                                <span class="material-symbols-outlined text-lg" data-icon="visibility">visibility</span>
                            </button>
                            <button class="p-2 rounded-lg hover:bg-error/10 text-error transition-colors">
                                <span class="material-symbols-outlined text-lg" data-icon="delete">delete</span>
                            </button>
                        </div>
                    </td>
                </tr>
            `;
    });

    tableBody.innerHTML = tableContent;
}


// handling pagination
function handlePagination (totalPages, currentPage){
    let paginationContent = "" ;

    for(let i = 1; i <= totalPages; i++ ){
            
            if(i === currentPage){
                paginationContent+= `<button class="w-8 h-8 rounded-lg text-on-primary bg-primary  font-bold text-xs">${i}</button>`;

            } else{
                    paginationContent+= `<button class="w-8 h-8 rounded-lg hover:bg-surface-container-high text-on-surface-variant font-bold text-xs transition-colors">${i}</button>`;
            }
    }

    pagesContainer.innerHTML = paginationContent;

}

const fetchPost = async (url) => {
    // Show loading state
    tableBody.innerHTML = `
        <tr>
            <td colspan="5" class="text-center py-5">
                <div class="flex justify-center items-center">
                    <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-primary"></div>
                    <span class="ml-2 text-on-surface-variant">Loading inquiries...</span>
                </div>
            </td>
        </tr>
    `;

    try {
        const response = await fetch(url);
        if (!response.ok) {
            throw new Error(`Error found: ${response.status}`);
        }
        const result = await response.json();
        const data = result.data;
        currentPage = parseInt(result.page) ;
        totalPages = parseInt(result.total_pages);

        console.log(currentPage, totalPages);
        displayinquires(data);
        handlePagination(totalPages, currentPage);

    } catch (error) {
        console.error(error);
        tableBody.innerHTML = `
            <tr>
                <td colspan="5" class="text-center py-5 text-error">
                    <div class="flex justify-center items-center">
                        <span class="material-symbols-outlined text-2xl mr-2" data-icon="error">error</span>
                        <span>Error loading inquiries. Please try again.</span>
                    </div>
                </td>
            </tr>
        `;
    }
}


fetchPost("http://localhost/new_portfolio/admin/api/");


