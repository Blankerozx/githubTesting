// let fixtures = JSON.parse(localStorage.getItem('fixtures')) || [];
// const stats = {};
// fixtures.forEach(match => {
//   const {teamA, teamB, scoreA = 0, scoreB = 0} = match;
//   if (!(teamA in stats)) stats[teamA] = {pts: 0, gf: 0, ga: 0 };
//   if (!(teamB in stats)) stats[teamB] = {pts: 0, gf: 0, ga: 0 };
//     stats[teamA].gf += scoreA;
//     stats[teamA].ga += scoreB;
//     stats[teamB].gf += scoreB;
//     stats[teamB].ga += scoreA;

//     if (scoreA > scoreB)
//       stats[teamA].pts +=3;
//     else if (scoreB > scoreA)
//       stats[teamB].pts += 3;
//     else {
//       stats[teamA].pts += 1;
//       stats[teamB].pts += 1;
//     }
// });

// const sorted = Object.entries(stats).sort((a, b) => b[1].pts - a[1].pts);

// document.querySelector("#leaderboard tbody").innerHTML = sorted.map(([team, {pts, gf, ga}]) => {
//   const gd = gf - ga;
//   return `<tr><td>${team}</td><td>${pts}</td><td>${gd}</td><td>${gf}</td><td>${ga}</td></tr>`;
// }).join('');