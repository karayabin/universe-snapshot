/* eslint-disable import/prefer-default-export */

export function style({ name, all = false, type = true, lang = true } = {}, { attributes } = {}) {
  if (all) { return true; }

  if (!name) {
    throw new Error('Missing \'name\' filter option');
  }
  if (!attributes) {
    throw new Error('No attributes passed to filter');
  }

  const typeAttributes = [
    (type && attributes.type),
    (lang && attributes.lang),
  ];

  return typeAttributes.includes(name) || typeAttributes.includes(`text/${name}`);
}
