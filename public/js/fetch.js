function useFetch(url, params, method = "POST") {
  return fetch(url, {
    method: method,
    body: JSON.stringify(params),
  }).then((response) => response.json());
}
