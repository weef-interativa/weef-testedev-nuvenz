module.exports = (env, argv) => {  
  process.env.NODE_ENV = process.env.NODE_ENV || argv.mode || 'development';

  const environment = require(`./webpack.config/${process.env.NODE_ENV}`);

  performance: {
    hints: false
  }

  return environment;
};