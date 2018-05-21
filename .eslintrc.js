module.exports = {
  "root": true,
  "extends": [
    "eslint:recommended",
    "wordpress"
  ],
  "globals": {
	"wp": true,
  },
  "env": {
    "node": true,
    "es6": true,
    "amd": true,
    "browser": true,
    "jquery": true
  },
  "parserOptions": {
    "ecmaFeatures": {
      "globalReturn": true,
      "generators": false,
      "objectLiteralDuplicateProperties": false,
      "experimentalObjectRestSpread": true
    },
    "ecmaVersion": 2017,
    "sourceType": "module"
  },
  "plugins": [
    "import"
  ],
  "settings": {
    "import/core-modules": [],
    "import/ignore": [
      "node_modules",
      "\\.(coffee|scss|css|less|hbs|svg|json)$"
    ]
  },
  "rules": {
    "no-console": process.env.NODE_ENV === 'production' ? 2 : 0,
    "comma-dangle": [
      "warn",
      {
        "arrays": "always-multiline",
        "objects": "always-multiline",
        "imports": "always-multiline",
        "exports": "always-multiline",
        "functions": "ignore"
      }
    ],
    "comma-spacing": "warn",
    "comma-style": "warn",
    "eqeqeq": "warn",
    "func-call-spacing": "warn",
    "indent": ["warn", "tab", { "SwitchCase": 1 }],
    "key-spacing": "warn",
    "keyword-spacing": "warn",
    "lines-around-comment": "off",
    "no-duplicate-case": "warn",
    "no-duplicate-imports": "error",
    "no-mixed-operators": "warn",
    "no-mixed-spaces-and-tabs": "warn",
    "no-var": "warn",
    "no-unused-vars": "warn",
    "object-curly-spacing": [
      "warn",
      "always"
    ],
    "prefer-const": "warn",
    "semi": "warn",
    "semi-spacing": "warn",
    "space-before-blocks": ["warn", "always"],
    "space-before-function-paren": ["warn", "never"],
    "space-in-parens": ["warn", "always"],
    "space-infix-ops": ["warn", { "int32Hint": false }],
    "space-unary-ops": [
      "warn",
      {
        "overrides": {
          "!": true
        }
      }
    ]
  }
}
