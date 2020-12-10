/* Bertrac Nathan */
let result = document.createElement('p');
        document.body.appendChild(result);

        let retry = document.createElement('input');
        document.body.appendChild(retry);

        retry.type = 'button';
        retry.style.visibility = 'hidden';

        const check = document.getElementById('check');
        let answer = Math.round(Math.random() * 10);

        let gamenumber = '1';
        let promptnumber = '2'

        function guessnumber(guess,answer){
            if(guess < 0 || guess > 10 || guess == null)result.textContent = 'Number between 0 and 10 dumbass';
            
            if(isNaN(guess)) result.textContent = 'I said number retard';
            
            if(guess < answer && guess >= 0) result.textContent = "Wrong number, too small";
            
            if(guess > answer && guess <= 10) result.textContent = "Wrong number, too big";
            
            if(guess == answer) result.textContent = `Contragulation! The answer was indeed ${answer}`;
        }

        function refresh(){
            location.reload(); 
        }
        
        function again(){
            let p=document.getElementById("child");
            retry.style.visibility = 'hidden';
            gamenumber ++;
            document.getElementById('guess' + `${gamenumber-1}`).disabled = true;
            let newinput = document.createElement('input');
            newinput.type = 'text';
            newinput.id = 'guess' + `${gamenumber}`;
            p.appendChild(newinput);
        }

        function game(){
            const guess = document.getElementById('guess' + `${gamenumber}`).value;
            guessnumber(guess, answer);
            if(guess != answer) again();
            if(guess == answer){
                retry.style.visibility = 'visible';
                retry.value = 'click to retry';
                retry.addEventListener('click', refresh);
            }
        }

        check.addEventListener('click', game);