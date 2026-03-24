const projects = [
    {
        name: "Iride Car Booking Company",
        description: "A comprehensive car rental and booking platform featuring a streamlined reservation system and real-time fleet management.",
        url: "https://iride.ng",
        picture: "assets/img/iride.png",
        stacks: ["Laravel", "Javascript", "PHP", "Tailwind"]
    },
    {
        name: "Good Luck Goods E-commerce",
        description: "A dynamic online marketplace built for speed, featuring a high-performance React frontend and a robust Laravel backend for secure transactions.",
        url: "https://shop.goodlucks.co",
        picture: "https://shop.goodlucks.co/assets/hero-img-Ci7wdoPu.jpg",
        stacks: ["Laravel", "React", "PHP"]
    },
    {
        name: "Diamond Shipping Landing Page",
        description: "A modern, high-conversion landing page for a logistics firm, optimized for mobile responsiveness and fast load times.",
        url: "https://www.diamondshipping.org.ng/",
        picture: "https://www.diamondshipping.org.ng/assets/img/hero.jpeg",
        stacks: ["HTML", "Tailwind CSS"]
    },
    {
        name: "Moving Forward Oil Company",
        description: "A sleek, professional corporate landing page for an energy enterprise, focusing on clean layout and brand identity.",
        url: "", // Note: Added a placeholder for the URL if available
        picture: "assets/img/movingforward.png",
        stacks: ["HTML", "React", "Tailwind"]
    }
]


const projectGrid = document.querySelector("#project-grid");

let projectContent = "";
projects.forEach((project) => {

    const allStacks = project.stacks.map(stack => `
    <span class="px-2 py-1 text-[10px] font-bold tracking-wider uppercase bg-blue-800 text-white rounded">
        ${stack}
    </span>
`).join('');
    projectContent += `
                    <div
          class="group flex flex-col bg-white dark:bg-slate-900 rounded-xl overflow-hidden border border-slate-200 dark:border-slate-800 shadow-sm hover:shadow-xl hover:shadow-primary/5 transition-all duration-300"
        >
          <div class="relative aspect-video overflow-hidden">
            <img
              class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
              data-alt="Abstract code line patterns with blue glow"
              src="${project.picture}"
            />
            <div class="absolute top-3 left-3 flex gap-2">
             ${allStacks}
             
            </div>
          </div>
          <div class="p-6 flex flex-col flex-1">
            <h3
              class="text-xl font-bold mb-2 group-hover:text-primary transition-colors"
            >
              ${project.name}
            </h3>
            <p class="text-slate-600 dark:text-slate-400 text-sm mb-4 flex-1">
              ${project.description}
            </p>
            <div class="flex items-center gap-4 mt-4">
              <a href="${project.url}"
                class="flex-1 bg-primary text-white text-xs font-bold py-2.5 rounded-lg hover:bg-primary/90 transition-colors"
              >
                View Case Study
              </a>
              <button
                class="flex items-center justify-center w-10 h-10 bg-slate-100 dark:bg-slate-800 rounded-lg hover:text-primary transition-colors"
              >
                <span class="material-symbols-outlined text-lg">code</span>
              </button>
            </div>
          </div>
        </div>
        `;
});

projectGrid.innerHTML = projectContent;