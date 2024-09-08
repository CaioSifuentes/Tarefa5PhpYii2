const escapeRegexRegex = new RegExp(
  "(\\" +
    [
      "/",
      ".",
      "*",
      "+",
      "?",
      "|",
      "(",
      ")",
      "[",
      "]",
      "{",
      "}",
      "\\",
      "$",
      "^"
    ].join("|\\") +
    ")",
  "gim"
);
export function escapeRegex(str) {
  return str.replace(escapeRegexRegex, "\\$1");
}
export function escapeRegexString(str) {
  return str.replace(escapeRegexRegex, "\\\\$1");
}
