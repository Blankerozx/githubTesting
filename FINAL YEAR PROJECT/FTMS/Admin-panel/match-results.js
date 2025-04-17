const fixtures = JSON.parse(localStorage.getItem('fixtures')) || [];
const html = fixtures.map(match => {
  if (match.scoreA !== undefined && match.scoreB !== undefined) {
    return `<p>${match.teamA} ${match.scoreA} - ${match.scoreB} ${match.teamB} (${match.match_date})</p>`;
  }
  return '';
}).join('');

document.getElementById('matchResults').innerHTML = html;