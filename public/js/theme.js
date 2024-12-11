document.addEventListener("DOMContentLoaded", () => {
    const toggler = document.querySelector("#toggler");
    const togglerIcon = toggler.children[0];
    const htmlElement = document.documentElement;

    // Function to set the theme
    function setTheme(theme) {
        htmlElement.setAttribute("data-theme", theme);
        localStorage.setItem("theme", theme);
        if (theme === "dark") {
            togglerIcon.classList.add("bx-moon");
            togglerIcon.classList.remove("bx-sun");
        } else {
            togglerIcon.classList.add("bx-sun");
            togglerIcon.classList.remove("bx-moon");
        }
    }

    // Retrieve theme from localStorage or use system preference
    function initializeTheme() {
        const storedTheme = localStorage.getItem("theme");
        const prefersDarkScheme = window.matchMedia(
            "(prefers-color-scheme: dark)"
        );
        if (storedTheme) {
            setTheme(storedTheme);
        } else if (prefersDarkScheme.matches) {
            setTheme("dark");
        } else {
            setTheme("light");
        }

        // Listen for changes in the system preference and update the theme accordingly
        prefersDarkScheme.addEventListener("change", (e) => {
            const newTheme = e.matches ? "dark" : "light";
            setTheme(newTheme);
        });
    }

    // Event listener for theme toggle button
    toggler.addEventListener("click", () => {
        const currentTheme = htmlElement.getAttribute("data-theme");
        const newTheme = currentTheme === "dark" ? "light" : "dark";
        setTheme(newTheme);
    });

    // Event listener for keyboard shortcut (Alt+T)
    document.addEventListener("keydown", (e) => {
        if (e.altKey && e.key.toLowerCase() === "t") {
            const currentTheme = htmlElement.getAttribute("data-theme");
            const newTheme = currentTheme === "dark" ? "light" : "dark";
            setTheme(newTheme);
        }
    });

    initializeTheme();
});
