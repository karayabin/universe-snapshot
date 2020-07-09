import test from 'ava';
import { style } from '../src/index';

test('should throw without options', t => {
  t.throws(style, 'Missing \'name\' filter option');
});

test('should throw without name option', t => {
  t.throws(() => style({}), 'Missing \'name\' filter option');
});

test('should throw without attributes', t => {
  t.throws(() => style({ name: 'test' }), 'No attributes passed to filter');
});

test('should return true with `all` option set', t => {
  t.is(style({ all: true }), true);
});

test('should return true with matching type', t => {
  t.is(style({ name: 'test' }, { attributes: { type: 'test' } }), true);
});

test('should return true with matching lang', t => {
  t.is(style({ name: 'test' }, { attributes: { lang: 'test' } }), true);
});

test('should return true with type text/name', t => {
  t.is(style({ name: 'test' }, { attributes: { type: 'text/test' } }), true);
});
