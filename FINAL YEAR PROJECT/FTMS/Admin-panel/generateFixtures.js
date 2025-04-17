// document.getElementById('fixtureForm').addEventListener('submit', function (e) {
//   e.preventDefault();
//   const names = document.getElementById('teamNames').value.split(',').map(t => t.trim());

//   // load existing fixtures from localstorage
//   let existingFixtures = JSON.parse(localStorage.getItem('fixtures')) || [];
  
//   let newFixtures = [];
//   for (let i = 0; i < names.length - 1; i++) {
//     for (let j = i + 1; j < names.length; j++) {
//       newFixtures.push({
//         teamA: names[i],
//         teamB: names[j],
//         match_date: new Date().toISOString().split('T')[0],
//         scoreA: '',
//         scoreB: ''
//       });
//     }
//   }

//   // combine old and new fixtures
//     const allFixtures = existingFixtures.concat(newFixtures);

//     // save updated list
//     localStorage.setItem('fixtures', JSON.stringify(allFixtures));
//     // window.currentFixtures = allFixtures;
//      displayFixtures(allFixtures);
// });

// function displayFixtures(fixtures) {
//   const fixtureList = document.getElementById('fixtureList');
//   fixtureList.innerHTML = '';
 
//  fixtures.forEach((match, index) => {
//    const div = document.createElement('div');
//    div.innerHTML = `
   
//    <strong>${match.teamA}</strong> vs <strong>${match.teamB}</strong>
//     <input type="date" value="${match.match_date}" onchange="updateDate(${index}, this.value)" />
//     <input type="number" placeholder="score A" value="${match.scoreA}" onchange="updateScore(${index}, 'scoreA', this.value)" />
//      <input type="number" placeholder="score B" value="${match.scoreB}" onchange="updateScore(${index}, 'scoreB', this.value)" />
    
//    `;

//    fixtureList.appendChild(div);
//  });
  
//   }
 
  
// // updatte match date

// function updateDate(index, date) {
// let fixtures = JSON.parse(localStorage.getItem('fixtures')) || [];
// fixtures[index].match_date = date
//   localStorage.setItem('fixtures', JSON.stringify(fixtures));
// }

// // update match scores
// function updateScore(index, key, value) {
//   let fixtures = JSON.parse(localStorage.getItem('fixtures')) || [];
//   fixtures[index][key] =value
//   localStorage.setItem('fixtures', JSON.stringify(fixtures));
// }

 
// window.addEventListener('DOMContentLoaded', () => {
//   const savedFixtures = JSON.parse(localStorage.getItem('fixtures')) || [];
//   displayFixtures(savedFixtures);
// });
// console.log(displayFixtures())


  // <style>
  //   body { font-family: Arial; margin: 20px; }
  //   input, button, select { margin: 5px; }
  // 
  // </style>






  let fixtures = [];

function generateFixtures() {
  const input = document.getElementById('teamInput').value;
  const teams = input.split(',').map(t => t.trim()).filter(t => t);
  fixtures = [];

  if (teams.length < 2) {
    alert("Please enter at least 2 teams.");
    return;
  }

  for (let i = 0; i < teams.length; i++) {
    for (let j = i + 1; j < teams.length; j++) {
      fixtures.push({
        team1: teams[i],
        team2: teams[j],
        date: '',
        time: '',
        venue: '',
        conflict: false
      });
    }
  }

  displayFixtures();
}

function displayFixtures() {
  let html = `<h3>Generated Fixtures</h3><table>
  <tr><th>#</th><th>Match</th><th>Date</th><th>Time</th><th>Venue</th><th>Actions</th></tr>`;

  fixtures.forEach((match, index) => {
    const conflictClass = match.conflict ? 'class="conflict"' : '';
    html += `<tr ${conflictClass}>
      <td>${index + 1}</td>
      <td>${match.team1} vs ${match.team2}</td>
      <td><input type="date" onchange="updateFixture(${index}, 'date', this.value)" value="${match.date}"></td>
      <td><input type="time" onchange="updateFixture(${index}, 'time', this.value)" value="${match.time}"></td>
      <td><input type="text" onchange="updateFixture(${index}, 'venue', this.value)" value="${match.venue}" placeholder="Enter venue"></td>
      <td><button onclick="deleteFixture(${index})">Delete</button></td>
    </tr>`;
  });

  html += `</table>`;
  document.getElementById('fixtureContainer').innerHTML = html;
  checkConflicts();
}

function updateFixture(index, field, value) {
  fixtures[index][field] = value;
  checkConflicts();
}

function deleteFixture(index) {
  fixtures.splice(index, 1);
  displayFixtures();
}

function checkConflicts() {
  fixtures.forEach(f => f.conflict = false);

  for (let i = 0; i < fixtures.length; i++) {
    for (let j = i + 1; j < fixtures.length; j++) {
      const a = fixtures[i];
      const b = fixtures[j];
      if (
        a.date && b.date &&
        a.time === b.time && a.date === b.date && a.venue === b.venue
      ) {
        a.conflict = b.conflict = true;
      }
      if (
        a.date && b.date &&
        a.time === b.time && a.date === b.date &&
        (a.team1 === b.team1 || a.team1 === b.team2 || a.team2 === b.team1 || a.team2 === b.team2)
      ) {
        a.conflict = b.conflict = true;
      }
    }
  }

  displayFixtures();
}