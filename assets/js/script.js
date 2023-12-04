// Fetch the text file
fetch('./text/hero_msg.txt')
                .then(response => response.text())
                .then(text => {
                    document.getElementById('hero_msg').innerHTML = text;
                });

fetch('./text/subject_mainProject.txt')
                .then(response => response.text())
                .then(text => {
                    document.getElementById('subject_mainProject').innerHTML = text;
                });

