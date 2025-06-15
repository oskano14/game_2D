// api.js

export async function loadCharacters(userId) {
  const response = await fetch(`http://localhost:8000/api/character/${userId}`);
  if (!response.ok)
    throw new Error("Erreur lors du chargement des personnages");
  return await response.json();
}

export async function saveProgress(progressData) {
  const response = await fetch(`http://localhost:8000/api/progress`, {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify(progressData),
  });
  return await response.json();
}
